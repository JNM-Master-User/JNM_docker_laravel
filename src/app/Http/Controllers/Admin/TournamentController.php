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
        try{
            session(['content'=>'content_tournaments']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'date' => ['date'],
                'date_end_upload' => ['date'],
                'desc' => [ 'nullable', 'string', 'max:255']
            ]);

            if(Tournament::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_tournaments', 'Tournament already exists');
            }
            else{
                Tournament::create([
                    'name' => $request->name,
                ]);
            }
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournament saved successfully');
        } catch (\Illuminate\Database\QueryException $e){
            $error = $e->errorInfo;
        }

        Tournament::updateOrCreate([
            'name' => Tournament::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'date' => $request->date,
            'date_end_upload' => $request->date_end_upload,
            'desc'=> $request->desc
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournaments saved successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroyTournaments(Request $request)
    {
        $request->validate([
            'id' => ['string', 'max:255'],
        ]);


        Tournament::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournament removed successfully');
    }
}
