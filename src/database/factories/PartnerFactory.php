<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unique = $this->faker->unique()->randomElement(['Symfony','Erasmus','Laravel','République Française','Crous Versailles','Conseil départemental des Hauts-de-Seine','France Culture','Mairie de Nanterre','Paris la Défense']);
        return [
            'name' => $unique,
            'company' => $unique,
            'path_picture' => strtolower(str_replace(' ','_',$unique).'.png'),
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id,
        ];
    }
}