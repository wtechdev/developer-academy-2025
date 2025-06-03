<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Ritorna tutti i posti senza filtrare user
//Route::get('/posts', [PostController::class, 'index']);

//JWT
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth'
], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('user_info', [AuthController::class, 'user_info']);
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->post('/posts', [PostController::class, 'index']);

