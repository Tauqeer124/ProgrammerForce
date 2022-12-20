<?php

namespace Database\Seeders;
use App\Models\Course;
use App\Models\Student;
use App\Models\Grade;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
    

        // to call factory 
        
         //Course::factory(5)->create();
         //Grade::factory(5)->create();
         //Student::factory(5)->create();



        //call seeder 
        // for($i=1;$i<=5;$i++){
            $this->call([
        //         CourseSeeder::class,
        //         GradeSeeder::class,
                StudentSeeder::class,
            ]);
        }
    }

