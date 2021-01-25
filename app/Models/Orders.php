<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='orders';

    public function relOrderItems(){
        return $this->hasMany('App\Models\OrderItems', 'cat_id');
    }
    
    public function orderItems(){
        return $this->hasMany('App\Models\OrderItems');
    }

    protected $fillable = [
        'customer_id', 'billing_email', 'billing_firstname', 'billing_lastname','billing_address', 'billing_city',
        'billing_province', 'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_total', 'note'
    ];

    // public function trophies()
    // {
    //    //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
    //    return $this->belongsToMany(
    //         Trop::class,
    //         'trophies_users',
    //         'user_id',
    //         'trophy_id');
    // }

}
