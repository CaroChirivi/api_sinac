<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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
// Route::middleware(['auth:api'])->group(function () { 
//     Route::post('/login', [AuthController::class], 'login')->name('login');
// });

// Route::middleware(['auth:sanctum'])->group(function () { 
//     Route::get('/users', 'UserController@index');
// });
//Route::post('/login', 'Auth\AuthController@login');
Route::post('/signin', ['as'=>'signin', 'uses'=>'App\Http\Controllers\AuthController@login']);
//Route::post('/login', [AuthController::class], 'login')->name('login');

// Route::middleware(['auth:sanctum'])->group(function () { 
//     Route::get('/users', 'UserController@index');
// });
