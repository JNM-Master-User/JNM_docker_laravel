<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PoleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePoles(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
        ]);

        Pole::updateOrCreate([
            'name' => Pole::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::POLES)->with('success_poles', 'Poles saved successfully');
    }
}
