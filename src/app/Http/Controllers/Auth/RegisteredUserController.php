<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DefinitionUserUserStatus;
use App\Models\Institution;
use App\Models\User;
use App\Models\UserSensitiveData;
use App\Models\UserStatus;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Rules\UserStatusCombination;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users_status = UserStatus::where('type', '!=', 'admin')->get();
        $institutions = Institution::all();

        return view('auth.register')->with([
            'institutions' => $institutions,
            'users_status' => $users_status
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['string', 'numeric', 'digits:10'],
            'address' => ['string', 'max:255'],
            'zip_code' => ['required', 'numeric', 'digits:5'],
            'type_status' => ['required', 'array', 'min:1', new UserStatusCombination],
            'type_status.*' => ['required', 'string', 'max:36'],
            'name_institution' => ['required', 'string', 'max:36']
        ]);

        $user = User::create([
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
        ]);

        $user_account_id = User::where('email', $request->email)->value('id');
        $avatar_path_picture = "avatar_user_" . $user_account_id . ".png";

        $user_sensitive_data = UserSensitiveData::create([
            'id_user' => $user_account_id,
            'name' => Str::lower($request->name),
            'last_name' => Str::lower($request->last_name),
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => Str::lower($request->address),
            'path_picture' => Str::lower($avatar_path_picture),
            'id_institution_user' => $request->name_institution,
            'created_by' => $user_account_id,
            'updated_by'=> $user_account_id,
        ]);

        foreach($request->type_status as $status_id){
            DefinitionUserUserStatus::create([
                'id_user' => $user_account_id,
                'id_user_status' => UserStatus::where('id', $status_id)->value('id'),
                'created_by' => $user_account_id,
                'updated_by'=> $user_account_id,
            ]);
        }

        $color = sprintf('#%06X', mt_rand(0xFF9999, 0xFFFF00));
        $color = str_replace( '#','',$color);
        $API_avatar_ui_url = "https://ui-avatars.com/api/?background=" . $color ."&color=000&name=" . $user_sensitive_data->name . "+" . $user_sensitive_data->last_name;
        $avatar = file_get_contents($API_avatar_ui_url);
        Storage::disk('users_profile_picture')->put($avatar_path_picture, $avatar);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ACCUEIL);

    }

    public function destroy(Request $request)
    {

    }
}
