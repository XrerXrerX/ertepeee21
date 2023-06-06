<?php

use App\Http\Controllers\RtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtpProviderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('dashboard.rtp.rtp', [
        'title' => 'RTP',

    ]);
});


// Route::get('/rtp', function () {
//     return view('dashboard.rtp.index', []);
// });


Route::resource('/rtp', RtpController::class)->Middleware('auth');
Route::get('rtp/posts/{totaldivisi:divisi}', [RtpController::class, 'show'])->Middleware('auth');
Route::get('rtp/search/{id}', [RtpController::class, 'showsearch'])->Middleware('auth');
Route::get('/create/rtp/{provider}', [RtpController::class, 'create'])->Middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->Middleware('auth');


Route::get('/trex1diath/register', [RegisterController::class, 'index']);
Route::post('/trex1diath/register', [RegisterController::class, 'store']);
