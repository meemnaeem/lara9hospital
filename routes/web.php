<?php

use Illuminate\Support\Str;
use App\Jambasangsang\helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('human_resource')->group(function () {
        Route::view('users', 'backend.admins.users.index')->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        foreach (Helper::getRoles() as $key => $role) {
            Route::view(Str::lower($role->name) ?? 'users', 'backend.admins.users.index')
            ->name('users.' .Str::lower($role->name) ?? 'index');
        }
    });
});
