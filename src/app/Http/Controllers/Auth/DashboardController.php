<?php

namespace App\Http\Controllers\Auth;

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
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

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
            "users"=>User::all(),
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
    public function renderHome()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_dashboard'=>true,
            'data'=>$data
        ]);
    }

    public function renderUsers()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_users'=>true,
            'data'=>$data
        ]);
    }

    public function renderRoles()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_roles'=>true,
            'data'=>$data
        ]);
    }

    public function renderPoles()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_poles'=>true,
            'data'=>$data
        ]);
    }

    public function renderPartners()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_partners'=>true,
            'data'=>$data
        ]);
    }
    public function renderTransports()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_transports'=>true,
            'data'=>$data
        ]);
    }

    public function renderInstitutions()
    {
        $data= $this->getData();

        return view('pages.dashboard',[
            'content_transports'=>true,
            'data'=>$data
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeRoles(Request $request)
    {
        $request->validate([
            'name' => [ 'string', 'max:255'],
        ]);

        Role::updateOrCreate([
            'name' => Role::where('name', $request->name)->first(),
        ],[
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::ROLES)->with('success_roles', 'Roles saved successfully');
    }
}
