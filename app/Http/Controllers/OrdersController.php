<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $objOrder;
    private $objItem;

    public function __construct(){
        $this->objOrder= new Orders();
        //$this->objItem=new OrderItems();
    }

    /**
     * Display a listing of the resource.
     * called from web.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=$this->objOrder->paginate(20);
        return view('adminOrders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * called when pressed insert button in adminOrders view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Called when pressed create button in the createOrders view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     * Called when pressed view button in the AdminOrders view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $order=$this->objOrder->find($id);
        $items = OrderItems::where('order_id', $id)->get();
        //$products = Product::all();
        $products = [];

        foreach($items as $i){
            $product = Product::where('id', $i->product_id)->get();
            array_push($products, $product);
        };

        return view('orderDetails', compact('order', 'items', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}
