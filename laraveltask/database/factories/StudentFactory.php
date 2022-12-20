<?php

namespace Database\Factories;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_name' => fake()->name(),
            'email' => fake()->email(),
            'course_id' =>rand(1, Course::count()),
            'grades_id' => rand(1, Grade::count()),
        ];
    }
}
