<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'address' => [ 'string', 'max:255'],
            'zip_code' => [ 'string', 'max:255']
        ]);

        Allotment::updateOrCreate([
            'name' => Allotment::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'address' => $request->address,
            'zip_code' => $request->zip_code
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_allotments', 'Allotments saved successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAllotments(Request $request)
    {

        $request->validate([
            'id' => ['string', 'max:255'],
        ]);

        Allotment::where('id' , $request->id)->delete();

        return redirect(RouteServiceProvider::HOME)->with('success_allotments', 'Allotments removed successfully');
    }
}
