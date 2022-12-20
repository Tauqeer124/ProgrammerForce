<?php

namespace Database\Seeders;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'course_id' => rand(1, Course::count()),
            'grades_id'=>rand(1, Grade::count()),
            'created_at' =>now(),
            'updated_at' =>now()
            
        ]);
    }
}
