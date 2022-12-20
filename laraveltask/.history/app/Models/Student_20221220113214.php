<?php

namespace App\Models;
use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentname',
        'email',
        'course_id',
        'grade_id',
        
    ];
    public function hascourse()
    {
        return $this->hasone(Course::class);
    }
    public function hasgrade()
    {
        return $this->hasone(Grade::class);
    }
}
