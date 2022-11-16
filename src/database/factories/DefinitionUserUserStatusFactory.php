<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DefinitionUserUserStatus>
 */
class DefinitionUserUserStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user_status' => UserStatus::all()->random(1)->first(),
            'id_user' => User::all()->random(1)->first(),
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id
            //
        ];
    }
}
