<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function storeInstitution(Request $request)
    {
        try {
            session(['content'=>'content_institutions']);

            $request->validate([
                'name' => [ 'string', 'max:255'],
                'address' => [ 'string', 'max:255'],
                'path_picture' => [ 'string', 'max:255'],
                'desc' => [ 'string', 'max:255']
            ]);

            if (Institution::where('name', $request->name)->first()) {
                return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_institutions', 'Institution already exists');
            } else {
                Institution::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'path_picture' => $request->path_picture,
                    'desc'=> $request->desc
                ]);
            }
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_institutions', trans('admin.save-success', ['attribute' => 'Institution']));
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_institutions', trans('admin.error-success', ['attribute' => 'Institution', 'error' => $e->errorInfo]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyInstitutions(Request $request)
    {

        try{
            $request->validate([
                'id' => ['string', 'max:255'],
            ]);
            Institution::where('id' , $request->id)->delete();
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_institutions', 'Institutions removed successfully');
        }

        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_institutions', 'Institutions not removed successfully');
        }
    }

    public function updateInstitutions(Request $request)
    {

        try {
            session(['content' => 'content_institutions']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'address' => [ 'string', 'max:255'],
                'path_picture' => [ 'string', 'max:255'],
                'desc' => [ 'string', 'max:255']
            ]);

            Institution::where('id', $request->id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'path_picture' => $request->path_picture,
                'desc'=> $request->desc
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_institutions', 'Institutions saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_institutions', $e->errorInfo);
        }
    }
}
