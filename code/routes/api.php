<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');

});

Route::get('/project', [ProjectController::class, 'list']);
Route::post('/project/store', [ProjectController::class, 'store']);
Route::post('/project/modify', [ProjectController::class, 'modify']);
Route::post('/project/remove', [ProjectController::class, 'remove']);