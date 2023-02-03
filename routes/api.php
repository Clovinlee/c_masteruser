<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware("apitoken")->group(function () {
    Route::get("/users", [UserController::class, "getUsers"]);
    Route::post("/adduser", [UserController::class, "register"]);
    Route::post("/edituser", [UserController::class, "editUser"]);
});
