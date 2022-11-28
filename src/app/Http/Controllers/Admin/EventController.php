<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeEvents(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
            'address' => [ 'string', 'max:255'],
            'date' => [ 'date'],
            'path_picture' => [ 'string', 'max:255'],
            'desc' => [ 'string', 'max:255']


        ]);

        Event::updateOrCreate([
            'name' => Event::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
            'address' => $request->address,
            'date' => $request->date,
            'path_picture' => $request->path_picture,
            'desc' => $request->desc
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_events', 'Events saved successfully');
    }
}
