<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function storeTournaments(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'date' => ['date'],
            'date_end_upload' => ['date'],
            'desc' => [ 'nullable', 'string', 'max:255']
        ]);

        Tournament::updateOrCreate([
            'name' => Tournament::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'date' => $request->date,
            'date_end_upload' => $request->date_end_upload,
            'desc'=> $request->desc
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_tournaments', 'Tournaments saved successfully');
    }
}
