<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'email', 'mobile_number', 'address', 'password', 'is_verified'];
}
