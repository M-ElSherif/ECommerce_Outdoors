<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table='categories';
    protected $fillable=['name', 'description'];
    public $timestamps = false;

    public function relProduct(){
        return $this->hasMany('App\Models\Product', 'cat_id');
    }
    
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
