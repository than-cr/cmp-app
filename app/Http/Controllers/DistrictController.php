<?php

namespace App\Http\Controllers;

use App\Models\District;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    public function getByCantonId($cantonId): \Illuminate\Http\JsonResponse
    {
        $districts = District::where('canton_id', $cantonId)->get();

        return response()->json($districts)->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    public function getById($id)
    {
        $district = District::find($id);

        return response()->json($district);
    }
}
