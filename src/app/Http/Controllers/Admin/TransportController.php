<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function storeTransports(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'path_picture' => [ 'string', 'max:255']
        ]);

        Transport::updateOrCreate([
            'name' => Transport::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'path_picture' => $request->path_picture
        ]);

        return redirect(RouteServiceProvider::TRANSPORT)->with('transports_videos', 'Transports saved successfully');
    }
}
