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

Route::get("/testapi", function () {
    $endpoint = "http://localhost:8000/api/users";
    $ch = curl_init($endpoint);

    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: a"]);


    $server_output = curl_exec($ch);

    curl_close($ch);

    return $server_output;
});

Route::middleware("apitoken")->group(function () {
    Route::get("/users", [UserController::class, "getUsers"]);
});
