<?php

namespace Database\Factories;

use App\Models\User;
use App
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>rand(1, User::count()),
            'product_id' =>rand(1, Product::count()),
        ];
    }
}
