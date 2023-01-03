<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    PUBLIC CONST USERS_STORAGE = '/public/users_profile_picture';
    PUBLIC CONST TRANSPORTS_STORAGE = '/public/transports';
    PUBLIC CONST ALLOTMENTS_STORAGE = '/public/allotments';

    public static function upload(Request $request, $folder, $value): string
    {
        $sanitized_image_name = strtolower(preg_replace("([^A-Za-z0-9])", "", $request->name)).'_'.time();
        $image_name = $sanitized_image_name.'.'.$request->$value->extension();

        $request->$value->storeAs($folder,$image_name);
        return $image_name;
    }
    //public/transports
    //public/users_profile_picture
}
