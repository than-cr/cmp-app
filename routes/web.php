<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/info', function () {
    phpinfo();
});

Route::get('/cantons/{provinceId}', [CantonController::class, 'getByProvinceId'])->name('canton.getByProvinceId');
Route::get('/districts/{cantonId}', [DistrictController::class, 'getByCantonId'])->name('district.getByCantonId');


Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/users/userRole', [UserController::class, 'assignRoleToUser'])->name('user.assignRoleToUser');
    Route::get('/users/userRole/{userId}', [UserController::class, 'getUserRole'])->name('user.getUserRole');
    Route::get('/users/provincecanton/{userId}', [UserController::class, 'getUserProvinceAndCantonByUserId'])->name('user.getUserProvinceAndCantonByUserId');
    Route::get('/roles/all', [RoleController::class, 'getRoles'])->name('roles.getRoles');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('lives', LiveController::class);

});

require __DIR__.'/auth.php';
