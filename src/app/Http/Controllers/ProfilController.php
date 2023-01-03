<?php

namespace App\Http\Controllers;

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
        //hugo
        //f4e49c26-c248-412d-8651-724807ea3709
        //miage
        //b22cae9c-6aab-4cd1-bfdb-c58305c496f0
        $user =  Auth::user()->load('bookingsUsersEvents');

        return view('pages.user.profil')->with([
            'bookings_users_events' => $user->bookingsUsersEvents
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
}