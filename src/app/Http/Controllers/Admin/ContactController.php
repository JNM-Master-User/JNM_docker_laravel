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
            'name' => [ 'string', 'max:255'],
            'last_name' => [ 'string', 'max:255']
        ]);

        Contact::updateOrCreate([
            'name' => Contact::where('name', $request->name)->first(),
            'last_name' => $request->last_name,
            'id_role' => Role::where('name', $request->name_role)->value('id'),
            'id_pole' => Pole::where('name', $request->name_pole)->value('id')
        ],[
            'name' => $request->name,
            'last_name' => $request->last_name,
            'id_role' => Role::where('name', $request->name_role)->value('id'),
            'id_pole' => Pole::where('name', $request->name_pole)->value('id')

        ]);

        return redirect(RouteServiceProvider::HOME)->with('success_contacts', 'Contacts saved successfully');
    }
}
