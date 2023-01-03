<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function storeTournament(Request $request)
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

    public function destroyTournament(Request $request)
    {
        $request->validate([
            'id' => ['string', 'max:255'],
        ]);


        Tournament::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournament removed successfully');
    }

    public function updateTournaments(Request $request)
    {

        try {
            session(['content' => 'content_allotments']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'date' => ['required','date', 'max:255'],
                'date_end_upload' => ['required','date', 'max:255'],
                'desc' => ['string', 'max:255']
            ]);

            Tournament::where('id', $request->id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'date_end_upload' => $request->date_end_upload,
                'desc' => $request->desc,
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournaments saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_tournaments', $e->errorInfo);
        }
    }


}
