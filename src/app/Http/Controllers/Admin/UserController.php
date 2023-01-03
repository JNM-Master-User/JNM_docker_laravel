<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUser(Request $request)
    {
        try {
            session(['content' => 'content_users']);

            $request->validate([
                'user_email' => ['required','string', 'max:255', 'unique:allotments,name'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            User::create([
                'email' => Str::lower($request->user_email),
                'password' => Hash::make($request->password),
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_user',
                    trans('admin.save-success',
                        ['attribute' => trans('User')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_user',
                    trans('admin.save-error',
                        ['attribute' => trans('User'), 'error' => $e]
                    ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyUser(Request $request)
    {
        try {
            session(['content' => 'content_users']);

            $request->validate([
                'user_id' => ['required','uuid', 'max:255'],
            ]);

            User::where('id', $request->user_id)->delete();

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_user',
                    trans('admin.destroy-success',
                        ['attribute' => trans('User')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_user',
                    trans('admin.destroy-error',
                        ['attribute' => trans('User'), 'error' => $e]
                    ));
        }
    }
}
