<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DefinitionUserUserStatus;
use App\Models\UserSensitiveData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AssignDefinitionUserUserStatus extends Controller
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
        $request->validate([
            'type' => ['nullable', 'string', 'max:255'],
            'id_user' => ['nullable', 'string', 'max:255'],
            'id_user_status' => ['nullable', 'string', 'max:255'],
        ]);

        $type_user_status =

        DefinitionUserUserStatus::create([
            'type' => $request->type,
            'id_user' => $request->id_user,
            'id_user_status' => $request->id_user_status
        ],[
            'type' => $request->type,
            'id_user' => $request->id_user,
            'id_user_status' => $request->id_user_status
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Sensitive data saved successfully');
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

        return redirect(RouteServiceProvider::HOME)->with('success', 'Sensitive data removed successfully');
    }
}
