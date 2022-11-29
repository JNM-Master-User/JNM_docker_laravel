<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

;

class UserStatusController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUsersStatus(Request $request)
    {
        $request->validate([
            'type' => [ 'string', 'max:255']
        ]);

        UserStatus::updateOrCreate([
            'type' => UserStatus::where('type', $request->type)->first(),
        ],[
            'type' => $request->type,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_users_status', 'Users status saved successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUsersStatus(Request $request)
    {

        $request->validate([
            'id' => ['string', 'max:255'],
        ]);

        UserStatus::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::HOME)->with('success_users_status', 'User status removed successfully');
    }
}