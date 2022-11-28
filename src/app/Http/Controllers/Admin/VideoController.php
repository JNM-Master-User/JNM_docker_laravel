<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function storeVideos(Request $request)
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

        return redirect(RouteServiceProvider::VIDEO)->with('success_videos', 'Videos saved successfully');
    }
}
