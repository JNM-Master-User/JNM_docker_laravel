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
    public function storeRoles(Request $request)
    {
        try{
            session(['content'=>'content_roles']);
            $request->validate([
                'name' => ['required','string', 'max:255', 'unique:roles'],
            ]);
            Role::create([
                'name' => $request->name,
            ]);
            return redirect(RouteServiceProvider::HOME)->with('success_roles', 'Role saved successfully');
        }
        catch (QueryException $e){
            return redirect(RouteServiceProvider::HOME)->with('error_roles', $e->errorInfo);
        }
    }
}
