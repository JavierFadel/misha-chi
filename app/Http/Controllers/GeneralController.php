<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('page.about');
    }
}
