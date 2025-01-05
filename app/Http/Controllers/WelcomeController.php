<?php

namespace App\Http\Controllers;

use App\Models\Live;
class WelcomeController extends Controller
{
    /**
     * Show the application welcome screen.
     *
     * @return
     */
    public function index()
    {
        $lives = Live::orderBy('id', 'DESC')->take(10)->get();
        return view('welcome', compact('lives'));
    }
}
