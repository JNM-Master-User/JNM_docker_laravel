<?php

namespace App\Http\Controllers;

use App\Models\Allotment;
use App\Models\BookingUserAllotment;
use App\Models\BookingUserEvent;
use App\Models\Event;
use App\Models\Navigo;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnersController extends Controller
{

    public function createPartners()
    {
        $partners =  Partner::all();

        return view('pages.user.partners')->with([
            'partners' => $partners
        ]);
    }

}