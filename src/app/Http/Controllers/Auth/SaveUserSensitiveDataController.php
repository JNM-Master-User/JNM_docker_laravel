<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserSensitiveData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class SaveUserSensitiveDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // -> resources/views/stocks/index.blade.php
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'date_of_birth' => ['required', 'date'],
                'phone_number' => ['nullable', 'numeric', 'digits:10'],
                'address' => ['nullable', 'string', 'max:255'],
                'zip_code' => ['nullable', 'digits:5']
            ]);


            UserSensitiveData::updateOrCreate([
                'id_user' => Auth::id()
            ], [
                'id_user' => Auth::id(),
                'name' => Str::lower($request->name),
                'last_name' => Str::lower($request->last_name),
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'address' => Str::lower($request->address),
                'zip_code' => Str::lower($request->zip_code),
            ]);

            return redirect(RouteServiceProvider::PROFIL)
                ->with('success_user-sensitive-data',
                    trans('admin.update-success',
                        ['attribute' => trans('Sensitive Data')]
                    ));
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::PROFIL)
                ->with('error_user-sensitive-data',
                    trans('admin.save-error',
                        ['attribute' => trans('Sensitive Data')]
                    ));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        UserSensitiveData::where(['id_user' => Auth::id()])->delete();

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success', 'Sensitive data removed successfully');
    }
}
