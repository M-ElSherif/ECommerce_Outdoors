<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    private $customer;

    public function __construct(){
        $this->customer= new Customers();
    }
    public function index()
    {
        $customer=$this->customer->find( Auth::user()->id );
        return view('checkout', compact('customer')); 
    }

    public function store(Request $request){

        if(Cart::instance('default')->subtotal()==0){
            return redirect()->route('checkout.index')->with('message', 'No item in the shopping cart!');
        }

        foreach (Cart::content() as $item) {
             $product = Product::find($item->model->id);
             if ($item->qty > $product->quantity) {
                 return back()->withErrors("One of the item in the cart is not availble currently");
             }
        }

        $items= Cart::content()-> map(function($item){
            return $item->model->name. ',' .$item->qty;
        })->values()->toJson();
      
        $order= Orders::create([
            'customer_id' => Auth::user()->id,
            'billing_firstname' => $request->first_name,
            'billing_lastname' => $request->last_name,         
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->post_code,
            'billing_email' => $request->email,  
            'billing_phone' => $request->phone_number,
            'billing_total'=> Cart::total(),
            'billing_name_on_card' => $request->name_on_card,   
            'billing_note'=> $request->note,                     
        ]);

        // Insert into order_items table
        foreach (Cart::content() as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
        
        try{
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'CAD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'purchase items' => $items,
                    'quantity' => Cart::instance('default')->count() 
                ],
              ]);
            
            Cart::instance('default')->destroy();
            return redirect()->route('thankyou.index')->with('message', 'Thank you! Your payment has been successfully accepted!');

            } catch(CardErrorException $e){
                return back()->withErrors('Error! '. $e->getMessage());
        }      
    } 
}

