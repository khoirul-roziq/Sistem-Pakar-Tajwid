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
    return redirect('login');
});

Route::get('/home', function () {
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

        Route::middleware(['auth:user', 'can:role,"admin"'])->group(function () {

            // Nama Tajwid Route
            Route::resource('dashboard', DashboardController::class);

            // Data User Route
            Route::resource('data-user', DataUserController::class);

            // Nama Tajwid Route
            Route::resource('nama-tajwid', NamaTajwidController::class);

            // Tanda Tajwid Route
            Route::resource('tanda-tajwid', TandaTajwidController::class);

            // Role Base Route
            Route::resource('role-base', RoleBaseController::class);

            // Tajwid Route
            Route::resource('tajwid', TajwidController::class);


        });
    }
);
