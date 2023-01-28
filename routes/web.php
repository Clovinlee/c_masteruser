<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test", function () {
    // $url = "https://dummyjson.com/products";
    $url = "https://mhs.sib.stts.edu/k4nobar/c_masteruser/c_masteruser/public/api/users";
    // $url = "https://localhost:8000/api/users";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: ' . env('APP_KEY'),
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $payload = json_encode( array( "customer"=> "Chris" ) );

    // curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
});
