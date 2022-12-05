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
        try{
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
        catch (QueryException $e){
            return redirect(RouteServiceProvider::HOME)->with('error_poles', $e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyPoles(Request $request)
    {
        try {
            $request->validate([
                'id' => ['string', 'max:255', 'unique:poles'],
            ]);
            Pole::where('id', $request->id)->delete();

            return redirect(RouteServiceProvider::HOME)->with('success_poles', 'Pole removed successfully');

        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::HOME)->with('error_poles', 'Pole not removed successfully');
        }
    }
}
