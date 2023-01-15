<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $provinces = Province::all();
        return view('auth.register', compact('provinces'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'motherLastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phoneNumber' => ['required', 'digits:8'],
            'birthDate' => ['required', 'date'],
            'province' => ['required', 'numeric', 'between:1,7'],
            'canton' => ['required', 'numeric', 'between:1,84'],
            'district' => ['required', 'numeric', 'between:1,489'],
            'address' => ['required', 'string', 'max:1024'],
            'gedeon' => ['boolean'],
            'gedeonModality' => ['boolean'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'motherLastName' => $request->motherLastName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'birthDate' => $request->birthDate,
            'district_id' => $request->district,
            'address' => $request->address,
            'gedeon' => $request->gedeon == true ? true : false,
            'gedeonModality' => $request->gedeonModality == true ? true : false,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', 'User')->first();
        $user->assignRole([$role->id]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
