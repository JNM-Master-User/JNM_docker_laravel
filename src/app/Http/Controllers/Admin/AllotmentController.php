<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AllotmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeAllotments(Request $request)
    {
        try{
            session(['content'=>'content_allotments']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'address' => [ 'string', 'max:255'],
                'zip_code' => [ 'string', 'max:255']
            ]);

            if(Allotment::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::HOME)->with('error_allotments', 'Allotment already exists');
            }
            else{
                Allotment::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'zip_code' =>$request->zip_code
                ]);
            }
            return redirect(RouteServiceProvider::HOME)->with('success_allotments', 'Allotments saved successfully');
        }
        catch (QueryException $e){
            return redirect(RouteServiceProvider::HOME)->with('error_allotments', $e->errorInfo);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAllotments(Request $request)
    {

        try{
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Allotment::where('id' , $request->id)->delete();
            return redirect(RouteServiceProvider::HOME)->with('success_allotments', 'Allotments removed successfully');
        }

        catch (QueryException $e) {
            return redirect(RouteServiceProvider::HOME)->with('error_allotments', 'Allotments not removed successfully');
        }
    }

    public function updateAllotments(Request $request)
    {

        try{
            session(['content'=>'content_allotments']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'address' => [ 'string', 'max:255'],
                'zip_code' => [ 'string', 'max:255']
            ]);

            if(Allotment::where('name', $request->name)->first()){
                return redirect(RouteServiceProvider::HOME)->with('error_allotments', 'Allotment already exists');
            }
            else{
                Allotment::where('id',$request->id) -> update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'zip_code' =>$request->zip_code
                ]);
            }
            return redirect(RouteServiceProvider::HOME)->with('success_allotments', 'Allotments saved successfully');
        }
        catch (QueryException $e){
            return redirect(RouteServiceProvider::HOME)->with('error_allotments', $e->errorInfo);
        }
    }
}
