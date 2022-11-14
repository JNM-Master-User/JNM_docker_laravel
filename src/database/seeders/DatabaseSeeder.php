<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Navigo;
use App\Models\Traits\CreatedUpdatedBy;
use App\Models\User;
use App\Models\UserSensitiveData;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use CreatedUpdatedBy;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::factory(5)->create();
        Navigo::factory(5)->create();
        User::factory(5)->create();
        UserSensitiveData::factory(5)->create();
    }
}
