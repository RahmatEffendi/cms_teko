<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobPublishController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Job
    Route::get("job-publishs/{id}/edit", [JobPublishController::class, 'edit'])->name("voyager.job-publishs.edit")->middleware("auth");
    Route::get("job-publishs/{id}/delete", [JobPublishController::class, 'destroy'])->name("voyager.job-publishs.delete")->middleware("auth");
    Route::post("job-publishs/approve", [JobPublishController::class, 'approve'])->name("voyager.job-publishs.approve")->middleware("auth");
    Route::post("job-publishs/reject", [JobPublishController::class, 'reject'])->name("voyager.job-publishs.reject")->middleware("auth");
    Route::get("job-publishs/view/{id}", [JobPublishController::class, 'show'])->name("voyager.job-publishs.show")->middleware("auth");

    // User
    Route::get("users/{id}/edit", [UserController::class, 'edit'])->name("voyager.users.edit")->middleware("auth");
    Route::get("users/{id}/delete", [UserController::class, 'destroy'])->name("voyager.users.delete")->middleware("auth");
    Route::post("users/approve", [UserController::class, 'approve'])->name("voyager.users.approve")->middleware("auth");
    Route::post("users/reject", [UserController::class, 'reject'])->name("voyager.users.reject")->middleware("auth");
    Route::get("users/view/{id}", [UserController::class, 'show'])->name("voyager.users.show")->middleware("auth");

    // Payment
    Route::get("payments/{id}/edit", [PaymentController::class, 'edit'])->name("voyager.payments.edit")->middleware("auth");
    Route::get("payments/{id}/delete", [PaymentController::class, 'destroy'])->name("voyager.payments.delete")->middleware("auth");
    Route::post("payments/approve", [PaymentController::class, 'approve'])->name("voyager.payments.approve")->middleware("auth");
    Route::post("payments/reject", [PaymentController::class, 'reject'])->name("voyager.payments.reject")->middleware("auth");
    Route::get("payments/view/{id}", [PaymentController::class, 'show'])->name("voyager.payments.show")->middleware("auth");
});
