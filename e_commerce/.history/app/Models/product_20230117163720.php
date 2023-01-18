<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'quantity',
        'price',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}