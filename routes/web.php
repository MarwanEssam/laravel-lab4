<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});
Route::controller(PostController::class)->prefix('/posts')->middleware('auth')->group(function () {

    Route::get('/create', 'create')->name('posts.create');
    Route::post('/', 'store')->name('posts.store');
    Route::get('/', 'index')->name('posts.index');
    Route::get('/{id}/edit', 'edit')->name('posts.edit');
    Route::put('/{id}/update', 'update')->name('posts.update');
    Route::delete('/{id}', 'destroy')->name('posts.destroy');
});
Route::controller(StudentController::class)->prefix('/students')->middleware('auth')->group(function () {

    Route::get('/create', 'create')->name('students.create');
    Route::post('/', 'store')->name('students.store');
    Route::get('/', 'index')->name('students.index');
    Route::get('/{id}/edit', 'edit')->name('students.edit');
    Route::put('/{id}/update', 'update')->name('students.update');
    Route::delete('/{id}', 'destroy')->name('students.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
