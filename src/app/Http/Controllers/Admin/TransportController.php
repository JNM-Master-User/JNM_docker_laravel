<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class TransportController extends Controller
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
                'path_picture' => [ 'string', 'max:255']
            ]);

            if(Transport::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::HOME)->with('error_transports', 'Transport already exists');
            }
            else{
                Transport::create([
                    'name' => $request->name,
                ]);
            }
            return redirect(RouteServiceProvider::HOME)->with('success_transports', 'Transport saved successfully');
        } catch (\Illuminate\Database\QueryException $e){
            $error = $e->errorInfo;
        }


            Transport::updateOrCreate([
                'name' => Transport::where('name', $request->name)->first(),
            ],[
                'name' => $request->name,
                'path_picture' => $request->path_picture
            ]);

            return redirect(RouteServiceProvider::HOME)->with('transports_videos', 'Transport saved successfully');
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

        return redirect(RouteServiceProvider::HOME)->with('success_transports', 'Transport removed successfully');
    }
}

