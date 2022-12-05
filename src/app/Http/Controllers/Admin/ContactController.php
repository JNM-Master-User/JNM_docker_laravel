<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Pole;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeContacts(Request $request)
    {
        $request->validate([
            'name' => [ '','string', 'max:255'],
            'last_name' => [ 'string', 'max:255'],
            'name_role' => [ 'string', 'max:255'],
            'name_pole' => [ 'string', 'max:255']
        ]);

        Contact::updateOrCreate([
            'name' => Contact::where('name', $request->name)->first(),
            'last_name' => Contact::where('name', $request->last_name)->first(),
            'id_role' => Role::where('id', $request->name_role)->value('id'),
            'id_pole' => Pole::where('id', $request->name_pole)->value('id')
        ],[
            'name' => $request->name,
            'last_name' => $request->last_name,
            'id_role' => Role::where('id', $request->name_role)->value('id'),
            'id_pole' => Pole::where('id', $request->name_pole)->value('id')

        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_contacts', 'Contacts saved successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyContacts(Request $request)
    {

        try{
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Contact::where('id' , $request->id)->delete();
            return redirect(RouteServiceProvider::HOME)->with('success_contacts', 'Contacts removed successfully');
        }

        catch (QueryException $e) {
            return redirect(RouteServiceProvider::HOME)->with('error_contacts', 'Contacts not removed successfully');
        }
    }

}
