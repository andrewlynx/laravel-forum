<?php

use App\Http\Controllers\ProfileController;
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

//Route::get('/threads', 'App\Http\Controllers\ThreadsController@index')->name('threads');
//Route::post('/threads', 'App\Http\Controllers\ThreadsController@store')->name('threads_store');
//Route::get('/threads/create', 'App\Http\Controllers\ThreadsController@create')->name('threads_create');
//Route::get('/threads/{thread}', 'App\Http\Controllers\ThreadsController@show');

Route::resource('threads', 'App\Http\Controllers\ThreadsController')
    ->name('index', 'threads');
Route::post('/threads/{thread}/replies', 'App\Http\Controllers\RepliesController@store')->name('add_thread_reply');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
