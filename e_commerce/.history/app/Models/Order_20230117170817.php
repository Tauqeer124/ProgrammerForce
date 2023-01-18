<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function Product(){
        return $this->hasMany(Product::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
