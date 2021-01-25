<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers';

    protected $fillable = ['firstname', 'surname', 'address', 'postalcode', 'city', 'province','country','phone', 'email'];
}
