<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // private $objProduct;
    private $objCategory;

    public function __construct(){
        // $this->objProduct=new Product();
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
        $categories=$this->objCategory->paginate(5);
        return view('adminCategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * called when pressed insert button in adminCategories view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->objCategory->all();
        return view('createCategories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * Called when pressed create button in the CreateCategories view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objCategory->create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        if($cad){
            return redirect('adminCategories');
        }
    }

    /**
     * Display the specified resource.
     * Called when pressed view button in the AdminCategories view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('createCategories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=$this->objCategory->find($id);
        return view('createCategories', compact('category'));

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
        $this->objCategory->where(['id'=>$id])->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('adminCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $found = false;
        // foreach ($this->objProduct->all() as $product) {
        //     if($product->cat_id = $id) $found = true;
        // }
        
        // if($found == false) {
            $del=$this->objCategory->destroy($id);
            return($del)?"Yes":"No";
        // } else {
        //     return "No";
        // }
    }
}
