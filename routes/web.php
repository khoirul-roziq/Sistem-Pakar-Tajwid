<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\WelcomeController;
use App\Http\Controllers\Guest\ConsultationController;
use App\Http\Controllers\Guest\RetriveAlQuranController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

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
        Route::post('registrasi', [AuthController::class, 'registrationProcess'])->name('registration.process');

        Route::resource('home', HomeController::class);

        Route::middleware(['auth:user', 'can:role,"admin"'])->group(function () {

            // Data User Route
            Route::resource('data-user', DataUserController::class);

            // Tanda Tajwid Route
            Route::resource('tanda-tajwid', TandaTajwidController::class);

            // Role Base Route
            Route::resource('rule-tajwid', RuleTajwidController::class);

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

            // Profile Route
            Route::resource('profile', ProfileController::class);

            // Dashboard Route
            Route::resource('dashboard', DashboardController::class);

            Route::get('konsultasi', [ConsultationController::class, 'index'])->name('konsultasi.mulai');

            Route::post('konsultasi', [ConsultationController::class, 'konsultasi'])->name('konsultasi');

            // get surah
            Route::get('surah', [RetriveAlQuranController::class, 'getSurah'])->name('get.surah');
            Route::post('ayah', [RetriveAlQuranController::class, 'getAyah'])->name('get.ayah');
            Route::post('hasil', [ConsultationController::class, 'hasil'])->name('konsultasi.hasil');
            Route::post('reset', [ConsultationController::class, 'reset'])->name('konsultasi.reset');

            // materi
            Route::resource('materi', MateriController::class);
        });
    }
);
