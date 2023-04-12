<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

Route::group(
    [
        'prefix' => config('prefix'),
        'namespace' => 'App\\Http\\Controllers',
    ],
    function () {
        Route::get('login', 'AuthController@formLogin')->name('login');
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::get('registrasi', 'AuthController@formRegistration')->name('registration');

        Route::middleware(['auth:user', 'can:role,"admin","pengguna"'])->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard.index');
            })->name('dashboard');
        });
    }
);
