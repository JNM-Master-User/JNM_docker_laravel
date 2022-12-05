<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Institution;
use App\Models\Navigo;
use App\Models\Partner;
use App\Models\Pole;
use App\Models\Role;
use App\Models\Service;
use App\Models\Tournament;
use App\Models\Transport;
use App\Models\User;
use App\Models\UserSensitiveData;
use App\Models\UserStatus;
use App\Models\Video;

class DashboardController extends Controller
{
    public function getPictures(): string
    {
        $pictures ="";
        return $pictures;
    }
    /**
     * Get the data.
     */
    public function getData() : array
    {
        $data = [
            "allotments"=>Allotment::all(),
            "contacts"=>Contact::all()->load('pole')->load('role'),
            "events"=>Event::all()->load('institutionManager'),
            "institutions"=>Institution::all(),
            "navigos"=>Navigo::all(),
            "partners"=>Partner::all(),
            "poles"=>Pole::all(),
            "services"=>Service::all(),
            "tournaments"=>Tournament::all(),
            "transports"=>Transport::all(),
            "users"=>User::all()->load('userSensitiveData')->load('subscriptionUserNavigo'),
            "users_status"=>UserStatus::all(),
            "users_sensitive_data"=>UserSensitiveData::all(),
            "videos"=>Video::all(),
            "roles"=>Role::all()
        ];

        return $data;
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function renderHome(){
        $data= $this->getData();

        return view('pages.dashboard',[
            'data'=>$data
        ]);
    }
}
