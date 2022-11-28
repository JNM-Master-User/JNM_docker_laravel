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
    /**
     * Get the data.
     */
    public function getData(){
        $data = [
            "allotments"=>Allotment::all(),
            "contacts"=>Contact::all(),
            "events"=>Event::all(),
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
    public function renderServices()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_services'=>true,
            'data'=>$data
        ]);
    }
    public function renderTournaments()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_tournaments'=>true,
            'data'=>$data
        ]);
    }
    public function renderVideos()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_videos'=>true,
            'data'=>$data
        ]);
    }
    public function renderUsersStatus()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_users_status'=>true,
            'data'=>$data
        ]);
    }
    public function renderAllotments()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_allotments'=>true,
            'data'=>$data
        ]);
    }
    public function renderContact()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_contacts'=>true,
            'data'=>$data
        ]);
    }
    public function renderEvents()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_events'=>true,
            'data'=>$data
        ]);
    }
}
