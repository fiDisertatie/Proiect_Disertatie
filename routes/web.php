<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('isAdmin');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('isAdmin');

});

require __DIR__.'/auth.php';
