<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
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
        try{
            session(['content'=>'content_users_status']);

            $request->validate([
                'type' => [ 'string', 'max:255']
            ]);


            if(UserStatus::where('type', $request->type)->first()){
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_users_status', 'User status already exists');
            }
            else{
                UserStatus::create([
                    'type' => $request->type,
                ]);
            }

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_users_status', 'Users status saved successfully');
        }

        catch (QueryException $e){
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_users_status', $e->errorInfo);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyUsersStatus(Request $request)
    {
        try {
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);

            UserStatus::where('id', $request->id)->delete();

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_users_status', 'User status removed successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_users_status', 'User status not removed successfully');
        }
    }

}
