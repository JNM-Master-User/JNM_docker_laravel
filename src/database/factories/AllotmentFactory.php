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
        $unique = $this->faker->unique()->randomElement(['Appartement','T2','Hotel','Chalet','T1']);

        return [
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