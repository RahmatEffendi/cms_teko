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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('v1/login', [AuthController::class, 'login'])->name('login');
Route::post('v1/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->get('/v1/user', function (Request $request) {
    return $request->user();
});