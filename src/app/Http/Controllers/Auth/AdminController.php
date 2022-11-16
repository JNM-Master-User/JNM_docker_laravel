<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //methods
    public function renderPartners(){
        $partners = Partner::all();

        return view('pages.partners', ['partners' => $partners]);
    }

    public function renderInstitutions(){
        $institutions = Institution::all();

        return view('pages.institutions',['institutions'=>$institutions]);
    }

    public function storePartners(Request $request){

        $request->validate([
            'name'=>['string', 'max:255'],
            'company'=>['string', 'max:255'],
            'path_picture'=>['string', 'max:255'],
        ]);

        Partner::updateorCreate([
            'path_picture'=>Partner::where('path_picture', $request->path_picture)->first(),
        ],[
            'name'=> $request->name,
            'company'=>$request->company,
            'path_picture'=>$request->path_picture
        ]);

        return redirect(RouteServiceProvider::PARTNERS)->with('success','Partners saved successfully');
    }
}
