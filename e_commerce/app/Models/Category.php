<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cname',
        'slug',
        'description',
    ];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    } 
}
