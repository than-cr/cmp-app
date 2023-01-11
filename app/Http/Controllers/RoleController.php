<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(20);
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required|unique:roles,name', 'permission' => 'required']);
            $role = Role::create(['name' => $request->get('name')]);
            $role->syncPermissions($request->get('permission'));

            return response()->json('Rol creado correctamente');
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error creando rol', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        try
        {
            $role = Role::findById($id);
            $role->permissions();
            return response()->json([$role,$role->permissions()->pluck('name')->toArray()]);
        }
        catch (\Throwable $exception)
        {
            report($exception);
            return response()->json("Error al obtener información del rol.", 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required',
                'permission' => 'required',
            ]);

            $role = Role::findById($id);

            $role->update($request->only('name'));
            $role->syncPermissions($request->get('permission'));
        }
        catch (\Throwable $exception)
        {
            report($exception);
            return response()->json("Error actualizando rol.", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRoles(): JsonResponse
    {
        $role = Role::all();
        return response()->json($role);
    }
}
