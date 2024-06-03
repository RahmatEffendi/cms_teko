<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\MasterController;
use App\Http\Controllers\Api\ProcessingController;

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

// Route::middleware('auth:sanctum')->get('/v1/user', function (Request $request) {
//     return $request->user();
// });

// Master
Route::get('v1/master/packages', [MasterController::class, 'getMasterPackages']);

Route::middleware('auth:sanctum')->prefix('v1')->group(function(){
    // user
    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    // Informations
    Route::get('/jobs/get', [ProcessingController::class, 'get_information']);
    Route::post('/jobs/create', [ProcessingController::class, 'post_information']);
});