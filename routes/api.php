<?php

use App\Http\Controllers\ApiController;
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


Route::get('/get-user/{id}', [ApiController::class,'getUser'])->name('get.user');
Route::get('/get-user', [ApiController::class,'getAllUsers'])->name('get.Alluser');
Route::get('/add-user/{nom}/{prenom}/{email}/{numero}/{password}', [ApiController::class,'addUser'])->name('add.user');
