<?php

namespace App\Http\Controllers;

use App\Models\Allotment;
use App\Models\BookingUserAllotment;
use App\Models\BookingUserEvent;
use App\Models\Event;
use App\Models\Navigo;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function createBookings()
    {

        return view('pages.user.bookings')->with([
        ]);
    }

    public function createEvents()
    {
        //hugo
        //f4e49c26-c248-412d-8651-724807ea3709
        //miage
        //b22cae9c-6aab-4cd1-bfdb-c58305c496f0
        $events =  Event::all();

        return view('pages.user.events')->with([
            'events' => $events
        ]);
    }

    public function createAllotments()
    {
        //hugo
        //f4e49c26-c248-412d-8651-724807ea3709
        //miage
        //b22cae9c-6aab-4cd1-bfdb-c58305c496f0
        $allotments =  Allotment::all();

        return view('pages.user.allotments')->with([
            'allotments' => $allotments
        ]);
    }

    public function createTransports()
    {
        //hugo
        //f4e49c26-c248-412d-8651-724807ea3709
        //miage
        //b22cae9c-6aab-4cd1-bfdb-c58305c496f0
        $navigos =  Navigo::all();

        return view('pages.user.transports')->with([
            'navigos' => $navigos
        ]);
    }

    public function storeBookingUserEvent(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'id_event' => ['required','uuid', 'max:255'],
            ]);

            BookingUserEvent::create([
                'id_user' => Auth::id(),
                'id_event' => $request->id_event
            ]);

            return redirect(RouteServiceProvider::EVENTS)
                ->with('success_events',
                    trans('admin.save-success',
                        ['attribute' => trans('Event')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::EVENTS)
                ->with('error_events',
                    trans('admin.save-error',
                        ['attribute' => trans('Event')]
                    ));
        }
    }

    public function storeBookingUserAllotment(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'id_allotment' => ['required','uuid', 'max:255'],
            ]);

            BookingUserAllotment::create([
                'id_user' => Auth::id(),
                'id_allotment' => $request->id_allotment
            ]);

            return redirect(RouteServiceProvider::ALLOTMENTS)
                ->with('success_allotments',
                    trans('admin.save-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::ALLOTMENTS)
                ->with('error_allotments',
                    trans('admin.save-error',
                        ['attribute' => trans('Allotment')]
                    ));
        }
    }
}