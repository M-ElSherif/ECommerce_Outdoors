<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    // maycon - security to allow just insert this field on database
    protected $fillable=['name', 'cat_id', 'description', 'image', 'price', 'quantity'];

    public function relCategory(){
        return $this->hasOne('App\Models\Categories', 'id', 'cat_id');
    }
    
    public function categories(){
        return $this->belongsTo('App\Models\Categories');
    }
}
