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

            //Check if users status is valid

            $str = array(["krish","hugo", "simon","k","h","s",
                "etudiant","ancien diplome","directeur MIAGE","membre BDE","membre CA","enseignant"]);

            @foreach ($str as $roles){
                if ($request->type == 'etudiant'){
                    if(preg_match($str,(\b(?:enseignant|ancien diplome|directeur|CA)\b|\*))) return 0;
                    return 1;

                }

                if ($request->type == 'enseignant'){
                    if(preg_match($str,(\b(?:etudiant|CA)\b|\*))) return 0;
                    return 1;

                }

                if ($request->type == 'ancien diplome'){
                    if(preg_match($str,(\b(?:etudiant|membre BDE|membre CA)\b|\*))) return 0;
                    return 1;

                }

                if ($request->type == 'directeur MIAGE'){
                    if(preg_match($str,(\b(?:etudiant|membre BDE|membre CA)\b|\*))) return 0;
                    return 1;

                }

                if ($request->type == 'membre BDE'){
                    if(preg_match($str,(\b(?:directeur MIAGE|membre CA|ancien diplome)\b|\*))) return 0;
                    return 1;

                }

                if ($request->type == 'membre CA'){
                    if(preg_match($str,(\b(?:etudiant|enseignant|directeur MIAGE|membre BDE)\b|\*))) return 0;
                    return 1;

                }
            }
            session(['content'=>'content_users_status']);

            $request->validate([
                'type' => [ 'string', 'max:255']
            ]);


            if(UserStatus::where('type', $request->type)->first()){
                return redirect(RouteServiceProvider::HOME)->with('error_users_status', 'User status already exists');
            }
            else{
                UserStatus::create([
                    'type' => $request->type,
                ]);
            }

            return redirect(RouteServiceProvider::HOME)->with('success_users_status', 'Users status saved successfully');
        }

        catch (QueryException $e){
            return redirect(RouteServiceProvider::HOME)->with('error_users_status', $e->errorInfo);
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

            return redirect(RouteServiceProvider::HOME)->with('success_users_status', 'User status removed successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::HOME)->with('error_users_status', 'User status not removed successfully');
        }
    }

}
$str = $request->type;
@if(preg_match($str,(\b(?:teacher|rocket)\b|\*)))
            {
                return 0;
            }else{
    return 1;
}
