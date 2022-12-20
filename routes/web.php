<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard', [
            'canLogin'       => Route::has('login'),
            'canRegister'    => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion'     => PHP_VERSION,
        ]);
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');

    Route::get('/permission/{role}', [RoleController::class, 'permissionShow'])->name('permission');
    Route::get('/permission-remove/{role}/{permission}', [RoleController::class, 'permissionRemove'])->name('permission.remove');
    Route::get('/permission-save/{role}/{permission}', [RoleController::class, 'permission'])->name('permission.save');
});


require __DIR__ . '/auth.php';
