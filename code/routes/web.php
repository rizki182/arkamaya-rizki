<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;

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

Route::get('/', [ProjectController::class, 'index']);
Route::get('/project/list', [ProjectController::class, 'list']);
Route::get('/project/add', [ProjectController::class, 'add']);
Route::get('/project/edit/{id}', [ProjectController::class, 'edit']);
Route::post('/project/store', [ProjectController::class, 'store']);
Route::post('/project/modify', [ProjectController::class, 'modify']);
Route::post('/project/remove', [ProjectController::class, 'remove']);
Route::post('/project/remove-batch', [ProjectController::class, 'removeBatch']);