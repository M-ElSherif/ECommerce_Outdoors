<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Member extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [
     'member_password', 'member_token',
    ];
    
    public function getAuthPassword()
    {
     return $this->member_password;
    }
}
