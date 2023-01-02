<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Models\Transport;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class  TransportController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeTransports(Request $request)
    {
        try{
            session(['content'=>'content_transports']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'picture' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            if(Transport::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_transports', 'Transport already exists');
            }
            else{
                if($request->hasFile('picture')){
                    $sanitized_image_name = strtolower(preg_replace("([^A-Za-z0-9])", "", $request->name)).'_'.time();
                    $image_name = $sanitized_image_name.'.'.$request->picture->extension();

                    Transport::create([
                        'name' => $request->name,
                        'path_picture' => $image_name
                    ]);

                    $request->picture->storeAs('public/transports',$image_name);
                }
            }

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_transports', 'Transport saved successfully');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_transports',$e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroyTransports(Request $request)
    {
        $request->validate([
            'id' => ['string', 'max:255'],
        ]);


        Transport::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_transports', 'Transport removed successfully');
    }

    public function updateTransports(Request $request)
    {

        try {
            session(['content' => 'content_services']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'path_picture' => ['required', 'string', 'max:255']
            ]);

            Tournament::where('id', $request->id)->update([
                'name' => $request->name,
                'path_picture' => $request->path_picture
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_tournaments', 'Tournaments saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_tournaments', $e->errorInfo);
        }
    }
}

