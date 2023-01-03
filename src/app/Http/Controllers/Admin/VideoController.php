<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function storeVideo(Request $request)
    {
        $request->validate([
            'title' => [ 'string', 'max:255'],
            'path_youtube' => [ 'string', 'max:255']
        ]);

        Video::updateOrCreate([
        ],[
            'title' => $request->title,
            'path_youtube' => $request->path_youtube
        ]);

        return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_videos', 'Videos saved successfully');
    }

    public function updateVideos(Request $request)
    {

        try {
            session(['content' => 'content_videos']);

            $request->validate([
                'id' => ['required', 'uuid', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'path_youtube' => ['string', 'max:255']
            ]);

            Video::where('id', $request->id)->update([
                'title' => $request->title,
                'path_youtube' => $request->path_youtube
            ]);

            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('success_videos', 'Videos saved successfully');
        } catch (QueryException $e) {
            return redirect(RouteServiceProvider::DASHBOARD_ACCUEIL)->with('error_videos', $e->errorInfo);
        }
    }
}
