<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:50,1')->group(function () {
    //users
    Route::get("users", [ UserController::class , "index" ])->name('users');
    Route::get("user/{uuid}", [ UserController::class , "getByUuid" ])->name('user');
    //orgaizations
    Route::get("organizations", [ OrganizationController::class , "index" ])->name('organizations');
    Route::get("organization/{uuid}", [ OrganizationController::class , "getByUuid" ])->name('organization');
});




