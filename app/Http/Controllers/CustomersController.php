<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Logins;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    private $objCustomers;

    public function __construct(){
        $this->objCustomers=new Customers();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=$this->objCustomers->paginate(5);
        return view('register', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd(request());
        $reg=$this->objCustomers->create([
            'firstname'=>$request->name,
            'surname'=>$request->lastname,
            'address'=>$request->address,
            'postalcode'=>$request->postalcode,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);

        $login= Logins::create([
            'customer_id'=>$reg->id,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        
        if($reg){
            // create a successful message
            return redirect('register')->with('added_customer', 'Thank you for you registration!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
