<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Models\Transport;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\PictureController as Picture;

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
    public function storeTransport(Request $request)
    {
        try{
            session(['content'=>'content_transports']);

            $request->validate([
                'name' => [ 'string', 'max:255','unique:transports,name'],
                'picture' => [ 'required','image','mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            if($request->hasFile('picture')){
                $image_name = Picture::upload($request,Picture::TRANSPORTS_STORAGE,'picture');

                Transport::create([
                    'name' => strtolower(preg_replace("([^A-Za-z0-9])", "", $request->name)),
                    'path_picture' => $image_name
                ]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroyTransport(Request $request)
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

