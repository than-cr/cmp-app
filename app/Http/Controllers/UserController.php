<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\District;
use App\Models\Model_has_roles;
use App\Models\Province;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        try {
            $user = User::find($id);
            return response()->json($user);
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error al obtener usuario.', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'motherLastName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                'phoneNumber' => 'required|digits:8',
                'birthDate' => 'required|date',
                'district_id' => 'required|numeric|between:1,489',
                'address' => 'required|string|max:1024',
                'gedeon' => 'required|boolean',
                'gedeonModality' => 'required|boolean',
                ]);

            $user =  User::find($id);
            $user->update($request->all());

            return response()->json('Usuario actualizado correctamente');
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error actualizando información del usuario', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserProvinceAndCantonByUserId($id): Response|Application|ResponseFactory
    {
        $user = User::find($id);
        $district = District::find($user->district_id);
        $canton = Canton::find($district->canton_id);
        $province = Province::find($canton->province_id);

        $userProvinceCanton = ['province' => $province->id, 'canton'  => $canton->id];

        return response($userProvinceCanton);
    }

    public function getUserRole($id)
    {
        $modelHasRole = Model_has_roles::where('model_id', $id)->get();
        return response()->json($modelHasRole);
    }

    public function assignRoleToUser(Request $request): JsonResponse
    {
        try {
            $user = User::find($request->model_id);
            $role = Role::findById($request->role_id);

            $user->syncRoles([$role->id]);

            return response()->json('Rol asignado correctamente.');
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json('Error asignando rol', 500);
        }
    }
}
