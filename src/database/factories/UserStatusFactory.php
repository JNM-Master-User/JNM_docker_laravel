<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserStatus>
 */
class UserStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //admin
            //etudiant, membre BDE
            //ancien etudiant, membre CA, directeur MIAGE,
            'type' => $this->faker->unique()->randomElement(['étudiant','admin','membre ca','membre bde','directeur miage','ancien diplômé', 'enseignant']),
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id
        ];
    }
}
