<?php

namespace App\Http\Controllers;

use App\Models\Live;
use http\Env\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request): Factory|View|Application
    {
        $lives = Live::orderBy('id', 'DESC')->paginate(15);
        return view('lives.index', compact('lives'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $this->validate($request, ['name' => 'required', 'live_id' => 'required|unique:lives,live_id', 'date' => 'required', 'time' => 'required' ]);

            $live = new Live;
            $live = Live::create([
                'name' => $request->get('name'),
                'live_id' => $request->get('live_id'),
                'date' => $request->get('date'),
                'time' => $request->get('time'),
            ]);

            return response()->json('Live creado exitosamente');

        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error creando live', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
           $live = Live::find($id);
           return response()->json($live);

        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error obteniendo información del live', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        try {
            $live = Live::find($id);
            return response()->json($live);

        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error obteniendo información del live', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $this->validate($request, ['name' => 'required', 'live_id' => 'required|unique:lives,live_id,'.$id, 'date' => 'required', 'time' => 'required' ]);

            $live = Live::find($id);

            $live->update($request->all());

            return response()->json('Live actualizado exitosamente');
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error actualizando información del live', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $live = Live::find($id);
            $live->delete();


        } catch (\Throwable $exception) {
            report($exception);
        }

        return redirect()->route('lives.index');
    }
}
