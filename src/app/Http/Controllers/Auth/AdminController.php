<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Role;
use App\Models\Transport;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function renderDashboard()
    {
        $roles = Role::all();

        return view('pages.dashboard')->with(array(
            'content_dashboard' => false,
            'roles' => $roles
        ));
    }

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
        $request->validate([
            'name' => [ 'string', 'max:255'],
        ]);


        Role::updateOrCreate([
            'name' => Role::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::ROLES)->with('success', 'Roles saved successfully');
    }
}