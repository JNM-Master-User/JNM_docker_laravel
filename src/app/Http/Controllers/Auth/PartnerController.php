<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Store a newly created resource in storage.
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
        ]);

        Partner::updateOrCreate([
            'name' => Partner::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::PARTNERS)->with('success_Partners', 'Partners saved successfully');
    }
}
