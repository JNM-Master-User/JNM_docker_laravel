<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allotment;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Admin\PictureController as Picture;

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
                'allotment_address' => ['required','string', 'max:255','unique:allotments,address'],
                'allotment_date' => [ 'required','date'],
                'allotment_picture' => ['required','image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'allotment_desc' => ['nullable','string','max:255']

            ]);

            if($request->hasFile('allotment_picture')){
                $image_name = Picture::upload($request,Picture::ALLOTMENTS_STORAGE,'allotment_picture');

                Allotment::create([
                    'name' => strtolower(preg_replace("([^A-Za-z0-9])", "", $request->allotment_name)),
                    'address' => $request->allotment_address,
                    'date' => $request->allotment_date,
                    'path_picture' => $image_name,
                    'desc' => $request->allotment_desc
                ]);
            }

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('success_allotment',
                    trans('admin.save-success',
                        ['attribute' => trans('Allotment')]
                    ));
        }
        catch (QueryException $e) {
            dd($e);
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)
                ->with('error_allotment',
                    trans('admin.save-error',
                        ['attribute' => trans('Allotment')]
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
                'allotment_address' => ['string', 'max:255','unique:allotments,address,'.$request->allotment_id],
            ]);

            Allotment::where('id', $request->allotment_id)->update([
                'name' => $request->allotment_name,
                'address' => $request->allotment_address,
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
                        ['attribute' => trans('Allotment')]
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
                        ['attribute' => trans('Allotment')]
                    ));
        }
    }
}
