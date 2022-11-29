<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function storeServices(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'desc' => [ 'string', 'max:255']
        ]);

        Service::updateOrCreate([
            'name' => Service::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'desc'=> $request->desc
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_services', 'Services saved successfully');
    }
}
