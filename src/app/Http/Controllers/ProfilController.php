<?php

namespace App\Http\Controllers;

use App\Models\BookingUserAllotment;
use App\Models\BookingUserEvent;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function createProfil()
    {
        $user_bookingsUsersEvents =  Auth::user()->load('bookingsUsersEvents.event');
        $user_bookingsUsersAllotments =  Auth::user()->load('bookingsUsersAllotments.allotment');

        return view('pages.user.profil')->with([
            'bookings_users_events' => $user_bookingsUsersEvents->bookingsUsersEvents,
            'bookings_users_allotments' => $user_bookingsUsersAllotments->bookingsUsersAllotments
        ]);
    }

    public function destroyBookingUserEvent(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'booking_user_event_id' => ['required','uuid', 'max:255'],
            ]);

            BookingUserEvent::where('id', $request->booking_user_event_id)->delete();

            return redirect(RouteServiceProvider::PROFIL)
                ->with('success_profil',
                    trans('admin.destroy-success',
                        ['attribute' => trans('Event')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::PROFIL)
                ->with('error_profil',
                    trans('admin.destroy-error',
                        ['attribute' => trans('Event')]
                    ));
        }
    }

    public function destroyBookingUserAllotment(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'booking_user_allotment_id' => ['required','uuid', 'max:255'],
            ]);

            BookingUserAllotment::where('id', $request->booking_user_allotment_id)->delete();

            return redirect(RouteServiceProvider::PROFIL)
                ->with('success_profil',
                    trans('admin.destroy-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::PROFIL)
                ->with('error_profil',
                    trans('admin.destroy-error',
                        ['attribute' => trans('Allotment')]
                    ));
        }
    }
}