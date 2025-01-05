<?php

namespace App\Http\Controllers;

use App\Models\Live;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $lives = Live::orderBy('id', 'DESC')->take(10)->get();
        return view('welcome', compact('lives'));
    }
}
