<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Institution;
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
    public function storeEvent(Request $request)
    {
        $request->validate([
            'name' => [ 'required','string', 'max:255'],
            'address' => [ 'required','string', 'max:255'],
            'date' => [ 'required','date'],
            'path_picture' => [ 'required','string', 'max:255'],
            'desc' => [ 'nullable','string', 'max:255'],
            'name_institution' => ['required','string','max:36'],
            'name_event_belong' => ['nullable','string','max:36']
        ]);

        Event::updateOrCreate([
            'name' => Event::where('name', $request->name)->first(),
            'address' => Event::where('address', $request->address)->first(),

        ],[
            'name' => $request->name,
            'address' => $request->address,
            'date' => $request->date,
            'path_picture' => $request->path_picture,
            'desc' => $request->desc,
            'id_institution_manager' => Institution::where('id', $request->name_institution)->value('id'),
            'id_event_belong' => Event::where('name', $request->name_event_belong)->value('id')
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_events', 'Events saved successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEvent(Request $request)
    {

        try{
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Event::where('id' , $request->id)->delete();
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_events', 'Events removed successfully');
        }

        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_events', 'Events not removed successfully');
        }
    }
}
