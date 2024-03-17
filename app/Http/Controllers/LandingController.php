<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LandingController extends Controller
{
    public function landing(): View
    {
        return view('landing');
    }
}
