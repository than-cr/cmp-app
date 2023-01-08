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
        $lives = Live::orderBy('id', 'asc')->get();
        return view('welcome', compact('lives'));
    }
}
