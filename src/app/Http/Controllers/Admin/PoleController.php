<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pole;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
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
    public function storePole(Request $request)
    {
        try{
            session(['content'=>'content_poles']);
            $request->validate([
                'name' => ['required','string', 'max:255'],
            ]);
            Pole::create([
                'name' => $request->name,
            ]);
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_poles', 'Pole saved successfully');
        }
        catch (QueryException $e){
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_poles', $e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyPole(Request $request)
    {
        try {
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Pole::where('id', $request->id)->delete();

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_poles', 'Pole removed successfully');

        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_poles', 'Pole not removed successfully');
        }
    }
}
