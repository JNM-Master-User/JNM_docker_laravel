<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institution>
 */
class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Nanterre','Sorbonne','Evry','Dauphine','Iut']),
            'address' => "1 rue random",
            'path_picture' => "picture.png",
            'desc' => "test ........",
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id
        ];
    }
}
