<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Store a newly created partner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePartners(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'company' => [ 'string', 'max:255'],
            'path_picture' => [ 'string', 'max:255']
        ]);

        Partner::updateOrCreate([
            'name' => Partner::where('name', $request->name)->first()
        ],[
            'name' => $request->name,
            'company' => $request->company,
            'path_picture' => $request->path_picture
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_partners', 'Partners saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyPartners(Request $request)
    {
        try {
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Partner::where('id', $request->id)->delete();

            return redirect(RouteServiceProvider::HOME)->with('success_partners', 'Partner removed successfully');

        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::HOME)->with('error_partners', 'Partner not removed successfully');
        }
    }
}

