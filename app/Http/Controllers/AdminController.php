<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $objProduct;
    private $objCategory;

    public function __construct(){
        $this->objProduct=new Product();
        $this->objCategory=new Categories();
    }

    /**
     * Display a listing of the resource.
     * called from web.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=$this->objProduct->paginate(5);
        return view('admin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * called when pressed insert button in Admin view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->objCategory->all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * Called when pressed create button in the Create view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->image;

        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images', $imageName);
        }

        $cad=$this->objProduct->create([
            'cat_id'=>$request->id_cat,
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>"images/".$imageName,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);

        if($cad){
            return redirect('admin');
        }
    }

    /**
     * Display the specified resource.
     * Called when pressed view button in the Admin view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // not implemented. I don't see needs to create this option.
        //echo 'Not implemented :\'(';
        return view('checkout');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=$this->objProduct->find($id);
        $categories=$this->objCategory->all();
        return view('create', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $image=$request->image;

        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images', $imageName);
        }

        $this->objProduct->where(['id'=>$id])->update([
            'cat_id'=>$request->id_cat,
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>"images/".$imageName,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objProduct->destroy($id);
        return($del)?"Yes":"No";
    }
}
