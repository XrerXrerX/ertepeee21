<?php

use App\Http\Controllers\RtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtpProviderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\RtpProvider;


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

// Route::get('/', function () {
//     return view('dashboard.rtp.rtp', [
//         'title' => 'RTP',

//     ]);
// });

Route::get('/dashboard', function () {
    return view('dashboard.rtp.rtp', [
        'title' => 'RTP',

    ]);
})->middleware('auth');


// Route::get('/rtp', function () {
//     return view('dashboard.rtp.index', []);
// });


Route::resource('/rtp', RtpController::class)->Middleware('auth');
Route::get('rtp/posts/{totaldivisi:divisi}', [RtpController::class, 'show'])->Middleware('auth');
Route::get('rtp/search/{id}', [RtpController::class, 'showsearch'])->Middleware('auth');
Route::get('/create/rtp/{provider}', [RtpController::class, 'create'])->Middleware('auth');


Route::get('/Ruli29s7djjw00/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/Ruli29s7djjw00/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);



Route::get('/', function () {
    return view('provider.pragmatic', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'pp' => RtpProvider::where('divisi', 'pp')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/habanero', function () {
    return view('provider.habanero', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'hb' => RtpProvider::where('divisi', 'hb')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/microgaming', function () {
    return view('provider.microgaming', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'mic' => RtpProvider::where('divisi', 'mic')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/pgsoft', function () {
    return view('provider.pgsoft', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'pg' => RtpProvider::where('divisi', 'rtp')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/toptrend', function () {
    return view('provider.toptrend', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'ttr' => RtpProvider::where('divisi', 'ttr')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/idn', function () {
    return view('provider.idn', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'idn' => RtpProvider::where('divisi', 'idn')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});

Route::get('/gmw', function () {
    return view('provider.gmw', [
        'provider' => 'PRAGMATIC PLAY',
        'id' => 'pp',
        'gmw' => RtpProvider::where('divisi', 'sg')
            ->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->get()
    ]);
});
