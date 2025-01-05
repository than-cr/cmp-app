<?php

namespace App\Http\Controllers;

use App\Models\Live;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome screen.
     *
     * @return Response
     */
    public function index(): Response
    {
        $lives = Live::orderBy('id', 'DESC')->take(10)->get();
        return view('welcome', compact('lives'));
    }
}
