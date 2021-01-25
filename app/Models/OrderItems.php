<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table='order_items';


    public function relOrders(){
        return $this->hasOne('App\Models\Orders', 'id', 'cat_id');
    }
    
    public function orders(){
        return $this->belongsTo('App\Models\Orders');
    }

    public function relProduct(){
        return $this->hasOne('App\Models\Product', 'id', 'cat_id');
    }
    
    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

    protected $fillable = ['order_id', 'product_id', 'quantity'];
}
