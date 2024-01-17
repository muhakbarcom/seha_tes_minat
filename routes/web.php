<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LogoutController;

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

// if laravel sanctum is login, then redirect to home
Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return view('v_home');
});

Route::get('/login', function () {
    return view('v_login');
});

Route::get('/register', function () {
    return view('v_register');
});

Route::get('/', function () {
    return view('v_home');
});

Route::get('/test-info', function () {
    return view('v_info');
});

Route::get('/consultation', function () {
    return view('v_consultation');
});

Route::get('/program-study', function () {
    return view('v_program_study');
});

Route::get('/contact', function () {
    return view('v_contact');
});

