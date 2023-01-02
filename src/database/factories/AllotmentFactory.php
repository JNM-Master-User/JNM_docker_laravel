<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Allotment>
 */
class AllotmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Appartement','T2','Hotel','Chalet','T1']),
            'address' => $this->faker->address,
            'zip_code' => $this->faker->randomNumber(5),
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id,
        ];
    }
}