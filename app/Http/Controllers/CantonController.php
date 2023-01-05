<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Province;
use Illuminate\Http\Request;

class CantonController extends Controller
{
    //
    public function getCantonsByProvince(Request $request) {
        $province = Province::where('name', $request->name);
    }
}
