<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Allotment;
use App\Models\BookingUserEvent;
use App\Models\DefinitionUserUserStatus;
use App\Models\Event;
use App\Models\Institution;
use App\Models\Navigo;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Tournament;
use App\Models\Traits\CreatedUpdatedBy;
use App\Models\User;
use App\Models\UserSensitiveData;
use App\Models\UserStatus;
use Database\Factories\PartnerFactory;
use Database\Factories\TournamentFactory;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
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
        $file = new Filesystem;
        $file->cleanDirectory('storage/app/public/users_profile_picture');
        User::create([
            'email' => 'root@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('azerty'),
            //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Institution::factory(5)->create();
        User::factory(5)->create();
        $users = User::all();
        $i=0;
        foreach ($users as $user){
            $avatar_path_picture = "avatar_user_" . $user->id . ".png";
            $color = sprintf('#%06X', mt_rand(0xFF9999, 0xFFFF00));
            $color = str_replace( '#','',$color);
            $API_avatar_ui_url = "https://ui-avatars.com/api/?background=" . $color ."&color=000&name=" . $user->email ;
            $avatar = file_get_contents($API_avatar_ui_url);
            Storage::disk('users_profile_picture')->put($avatar_path_picture, $avatar);

            $emailarray  = explode('@',$user->email);
            $emailPrefix = $emailarray[0];
            $user_full_name = explode('.',$emailPrefix);
            $name = $user_full_name[0];
            if(count($user_full_name)>1) {
                $last_name = $user_full_name[1];
            }else{
                $last_name = 'smith';
            }
            UserSensitiveData::create([
                'id_user' => $user->id ,
                'name' => $name,
                'last_name' => $last_name,
                'date_of_birth' => '2013-07-07 00:01:00',
                'phone_number' => '0'.(623456789 + $i),
                'address' => '45 random address',
                'path_picture' => "avatar_user_" . $user->id . ".png",
                'id_institution_user' => Institution::all()->random(1)->first()->id,
                'created_by' => $user->id,
                'updated_by'=> $user->id,
            ]);
            $i+=1;
        }

        UserStatus::factory(7)->create();
        DefinitionUserUserStatus::factory(5)->create();
        DefinitionUserUserStatus::create([
            'id_user' => User::where('email', 'root@example.com')->value('id'),
            'id_user_status' => UserStatus::where('type', 'admin')->value('id'),
            'created_by' => User::where('email', 'root@example.com')->value('id'),
            'updated_by'=> User::where('email', 'root@example.com')->value('id')
        ]);
        Event::create([
            'id_institution_manager' => Institution::where('name','Nanterre')->first()->id,
            'name' => 'Journée des Miages',
            'address' => '200 Av. de la République, 92000 Nanterre',
            'date' => '2023-01-05 00:01:00',
            'path_picture' => 'jnm.png',
            'desc' => 'Journée des Miages qui rassemble toutes les MIAGES de france',
            'created_by' => User::where('email','root@example.com')->first()->id,
            'updated_by' => User::where('email','root@example.com')->first()->id,
        ]);
        Event::factory(4)->create();
        Navigo::factory(5)->create();
        Allotment::factory(5)->create();
        Tournament::factory(1)->create();
        Partner::factory(9)->create();
        BookingUserEvent::factory(5)->create();
    }
}
