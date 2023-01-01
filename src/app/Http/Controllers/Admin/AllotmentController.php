<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AllotmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeAllotment(Request $request)
    {
        try {
            session(['content' => 'content_allotments']);

            $request->validate([
                'allotment_name' => ['required','string', 'max:255', 'unique:allotments,name'],
                'allotment_address' => ['required','string', 'max:255','unique:allotments,address,NULL,id,zip_code,'.$request->allotment_zip_code],
                'allotment_zip_code' => ['required','numeric', 'digits:5','unique:allotments,zip_code,NULL,id,address,'.$request->allotment_address]
            ]);

            Allotment::create([
                'name' => $request->allotment_name,
                'address' => $request->allotment_address,
                'zip_code' => $request->allotment_zip_code
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_allotment',
                    trans('admin.save-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_allotment',
                    trans('admin.save-error',
                        ['attribute' => trans('Allotment'), 'error' => $e]
                    ));
        }
    }

    public function updateAllotment(Request $request)
    {

        try {
            session(['content' => 'content_allotments']);

            $request->validate([
                'allotment_id' => ['required', 'uuid', 'max:255'],
                'allotment_name' => ['required', 'string', 'max:255','unique:allotments,name,'.$request->allotment_id],
                'allotment_address' => ['string', 'max:255','unique:allotments,address,'.$request->allotment_id.',id,zip_code,'.$request->allotment_zip_code],
                'allotment_zip_code' => ['numeric', 'digits:5', 'max:99999','unique:allotments,zip_code,'.$request->allotment_id.',id,address,'.$request->allotment_address]
            ]);

            Allotment::where('id', $request->allotment_id)->update([
                'name' => $request->allotment_name,
                'address' => $request->allotment_address,
                'zip_code' => $request->allotment_zip_code
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_allotment',
                    trans('admin.update-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_allotment',
                    trans('admin.update-error',
                        ['attribute' => trans('Allotment'), 'error' => $e]
                    ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyAllotment(Request $request)
    {
        try {
            session(['content' => 'content_allotments']);

            $request->validate([
                'allotment_id' => ['string', 'max:255'],
            ]);

            Allotment::where('id', $request->allotment_id)->delete();

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_allotment',
                    trans('admin.destroy-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_allotment',
                    trans('admin.destroy-error',
                        ['attribute' => trans('Allotment'), 'error' => $e]
                    ));
        }
    }
}
