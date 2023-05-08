<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Guest\WelcomeController;
use App\Http\Controllers\Guest\ConsultationController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KategoriController;

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
})->name('home');

Route::get('/test', function () {
    return view('test');
})->name('test');

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

            // Dashboard Route
            Route::resource('dashboard', DashboardController::class);

            // Data User Route
            Route::resource('data-user', DataUserController::class);

            // Tanda Tajwid Route
            Route::resource('tanda-tajwid', TandaTajwidController::class);

            // Role Base Route
            Route::resource('role-base', RoleBaseController::class);

            // Tajwid Route
            Route::resource('tajwid', TajwidController::class);

            // pertanyaan
            Route::resource('pertanyaan', PertanyaanController::class);

            // jawaban
            Route::resource('jawaban', JawabanController::class);

            // kategori
            Route::resource('kategori', KategoriController::class);
        });

        Route::middleware(['auth:user', 'can:role, "admin","guest"'])->group(function () {
            // Welcome Route
            Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome.index');

            Route::get('konsultasi', [ConsultationController::class, 'index'])->name('konsultasi.mulai');

            // kategori
            Route::get('kategori/{id}', [ConsultationController::class, 'kategori'])->name('kategori');

            // ghunnah
            Route::get('ghunnah/{page}', [ConsultationController::class, 'ghunnahView'])->name('ghunnah.view');
            Route::post('ghunnah/{page}', [ConsultationController::class, 'ghunnah'])->name('ghunnah');

            
        });
    }
);
