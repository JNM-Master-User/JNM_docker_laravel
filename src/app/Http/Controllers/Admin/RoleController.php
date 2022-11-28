<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
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
        session(['content'=>'content_roles']);
        $request->validate([
            'name' => [ 'string', 'max:255'],
        ]);

        Role::updateOrCreate([
            'name' => Role::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_roles', 'Roles saved successfully');
    }
}
