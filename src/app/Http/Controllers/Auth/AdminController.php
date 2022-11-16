<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pole;
use App\Models\UserSensitiveData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function renderPoles()
    {
        $poles = Pole::all();
        return view ('pages.poles',['poles' => $poles]);
    }

    public function storePoles(request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
        ]);


        Pole::updateOrCreate([
            'name' => Pole::where('name',$request->name)->first(),
        ],[
            'name' => $request->name
        ]);

        return redirect(RouteServiceProvider::POLES)->with('success', 'Poles saved successfully');
    }
}
