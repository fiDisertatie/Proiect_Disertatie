<?php

use App\Http\Controllers\AdeverintaIncadrare;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/import', [StudentController::class, 'create_import'])->name('students.create.import');
    Route::post('/students/import', [StudentController::class, 'import_excel'])->name('students.import.excel');
    Route::post('/students/truncate', [StudentController::class, 'truncate'])->name('students.truncate');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/import', [TeacherController::class, 'create_import'])->name('teachers.create.import');
    Route::post('/teachers/import', [TeacherController::class, 'import_excel'])->name('teachers.import.excel');
    Route::post('/teachers/truncate', [TeacherController::class, 'truncate'])->name('teachers.truncate');
    Route::get('/teachers/{teacher}/adeverinta-incadrare', [AdeverintaIncadrare::class, 'create'])->name('teachers.generate.adeverinta');
    Route::post('/teachers/adeverinta-incadrare', [AdeverintaIncadrare::class, 'store'])->name('teachers.store.adeverinta');

    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('isAdmin');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('isAdmin');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('isAdmin');

});

require __DIR__.'/auth.php';
