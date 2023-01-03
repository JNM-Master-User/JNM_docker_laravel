<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function storeService(Request $request)
    {
        try{
            session(['content'=>'content_services']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'desc' => [ 'string', 'max:255']
            ]);

            if(Service::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_services', 'Service already exists');
            }
            else{
                Service::create([
                    'name' => $request->id,
                ]);
            }
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_services', 'Service saved successfully');
        } catch (\Illuminate\Database\QueryException $e){
            $error = $e->errorInfo;
        }

        Service::updateOrCreate([
            'name' => Service::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'desc'=> $request->desc
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_services', 'Services saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroyService(Request $request)
    {
        $request->validate([
            'id' => ['string', 'max:255'],
        ]);


        Service::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_services', 'Service removed successfully');
    }

    public function updateServices(Request $request)
    {

        try {
            session(['content' => 'content_services']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'desc' => ['string', 'max:255']
            ]);

            Service::where('id', $request->id)->update([
                'name' => $request->name,
                'desc' => $request->desc
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_services', 'Services saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_services', $e->errorInfo);
        }
    }
}
