<?php

use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;
use App\Models\Todo;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('todos',TodoController::class);

Route::controller(TodoController::class)->group(function(){
    Route::get('/todos','index');
    Route::get('/todos/id','show');
    Route::post('/todos','store');
    Route::patch('/todos/update','update');
    Route::delete('/todos/delete','destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::post('/users','store');
    Route::get('/users/id','show');
    Route::patch('/users/update','update');
    Route::delete('/users/delete','destroy');
});
