<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes(['register' => false]);

Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);
    Route::delete('post/image/destroy/{post_id}',
        [App\Http\Controllers\PostImageController::class, 'destroy'])->name('post.image.destroy');
});

