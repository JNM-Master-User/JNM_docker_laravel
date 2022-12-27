<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccueilController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.accueil');
    }
}