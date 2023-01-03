<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeRole(Request $request)
    {
        try{
            session(['content'=>'content_roles']);
            $request->validate([
                'name' => ['required','string', 'max:255', 'unique:roles'],
            ]);
            Role::create([
                'name' => $request->name,
            ]);
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_roles', 'Roles saved successfully');
        }
        catch (QueryException $e){
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_roles', $e->errorInfo);
        }
    }

    public function destroyRole(Request $request)
    {

        try{
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Role::where('id' , $request->id)->delete();
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_roles', 'Roles removed successfully');
        }

        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_roles', 'Roles not removed successfully');
        }
    }

    public function updateRoles(Request $request)
    {

        try {
            session(['content' => 'content_roles']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'name' => ['required', 'string', 'max:255']
            ]);

            Role::where('id', $request->id)->update([
                'name' => $request->name
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_roles', 'Roles saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_roles', $e->errorInfo);
        }
    }

}

