<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    protected $table='logins';

    protected $fillable = ['customer_id', 'email', 'password'];
}
