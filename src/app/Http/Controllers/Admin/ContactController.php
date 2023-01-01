<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Pole;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeContact(Request $request)
    {
        try {
            session(['content'=>'content_contacts']);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'name_role' => ['required', 'string', 'max:255'],
                'name_pole' => ['required', 'string', 'max:255']
            ]);

            if(Contact::where([
                'id_role' => Role::where('id', $request->name_role)->value('id'),
                'id_pole' => Pole::where('id', $request->name_pole)->value('id')
            ])){
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_contacts', 'Contact already exists');
            }

            Contact::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'id_role' => Role::where('id', $request->name_role)->value('id'),
                'id_pole' => Pole::where('id', $request->name_pole)->value('id')

            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_contacts', 'Contacts saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_contacts', 'Contact could not be saved successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyContact(Request $request)
    {

        try {
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Contact::where('id', $request->id)->delete();
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_contacts', 'Contact removed successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_contacts', 'Contact could not be removed successfully');
        }
    }

}
