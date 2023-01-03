<?php

namespace Database\Factories;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unique = $this->faker->unique()->randomElement(['football','kayak','boite de nuit','danse']);
        return [
            'id_institution_manager' => Institution::all()->random(1)->first()->id,
            'name' => $unique,
            'address' => $this->faker->address,
            'date' => $this->faker->date,
            'path_picture' => strtolower(str_replace(' ','_',$unique).'.png'),
            'desc' => $this->faker->paragraph,
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id,
        ];
    }
}