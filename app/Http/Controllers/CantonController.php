<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use Symfony\Component\HttpFoundation\Response;

class CantonController extends Controller
{
    public function getByProvinceId($provinceId): \Illuminate\Http\JsonResponse
    {
        $cantons = Canton::where('province_id', $provinceId)->get();
        return response()->json($cantons)->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }
}
