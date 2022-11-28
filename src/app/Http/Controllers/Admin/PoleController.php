<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

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
        session(['content'=>'content_poles']);

        $request->validate([
            'name' => [ 'string', 'max:255'],
        ]);

        if(Pole::where('name', $request->name)->first()){
            return redirect(RouteServiceProvider::HOME)->with('error_poles', 'Pole already exists');
        }
        else{
            Pole::create([
                'name' => $request->name,
            ]);
        }
        return redirect(RouteServiceProvider::HOME)->with('success_poles', 'Pole saved successfully');
    }
}
