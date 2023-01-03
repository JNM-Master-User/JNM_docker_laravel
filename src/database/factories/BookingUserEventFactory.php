<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingUserEvent>
 */
class BookingUserEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_id = User::where('email','!=','root@example.com')->pluck('id');
        $events_id = Event::where('name','!=','Journée des Miages')->pluck('id');
        $user_id = $this->faker->unique()->randomElement($users_id);
        $event_id = $this->faker->randomElement($events_id);
        return [
            'id_user' => $user_id,
            'id_event' => $event_id,
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id,
        ];
    }
}