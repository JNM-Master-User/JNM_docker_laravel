<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function storeInstitutions(Request $request)
    {
        session(['content'=>'content_institutions']);
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'address' => [ 'string', 'max:255'],
            'path_picture' => [ 'string', 'max:255'],
            'desc' => [ 'string', 'max:255']
        ]);

        Institution::updateOrCreate([
            'name' => Institution::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'address' => $request->address,
            'path_picture' => $request->path_picture,
            'desc'=> $request->desc
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_institutions', 'Institutions saved successfully');
    }
}
