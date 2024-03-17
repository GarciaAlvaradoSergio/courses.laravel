<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LandingController::class, 'landing'])->name('landing');

Auth::routes();
Route::middleware('auth')->group(function () {

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/update/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::get('/courses/show/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::delete('/courses/destroy/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('modules', ModuleController::class)->middleware(['auth', 'verified']);
