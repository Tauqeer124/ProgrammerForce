<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'grades',
        
    ];
    public function studentgrade()
    {
        return $this->belongsto(Student::class,'grades_id');
    }
}
