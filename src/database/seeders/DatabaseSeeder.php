<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DefinitionUserUserStatus;
use App\Models\Institution;
use App\Models\Navigo;
use App\Models\Traits\CreatedUpdatedBy;
use App\Models\User;
use App\Models\UserSensitiveData;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        User::create([
            'email' => 'root@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('azerty'),
            //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::factory(5)->create();
        UserStatus::factory(7)->create();
        DefinitionUserUserStatus::factory(5)->create();
        DefinitionUserUserStatus::create([
            'id_user' => User::where('email', 'root@example.com')->value('id'),
            'id_user_status' => UserStatus::where('type', 'admin')->value('id'),
            'created_by' => User::where('email', 'root@example.com')->value('id'),
            'updated_by'=> User::where('email', 'root@example.com')->value('id')
        ]);
        Institution::factory(5)->create();
        //Navigo::factory(5)->create();
        //UserSensitiveData::factory(5)->create();
    }
}
