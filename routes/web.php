<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\ConsultationController;

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
})->name('login');

Route::get('/register', function () {
    return view('v_register');
});

Route::get('/', function () {
    return view('v_home');
});

Route::get('/report', [ReportController::class, 'downloadReportWithDomPDFByHTML'])->name('report');

Route::get('/test-info', function () {
    return view('v_info');
});

// login terlebih dahulu
Route::get('/consultation/{codeTest?}' , [ConsultationController::class, 'index'])->name('consultation')->middleware('auth:sanctum');


// program study by id
Route::get('/program-study/{id}', function () {
    $id = request()->route('id');
    return view('v_program_study_detail', ['id' => $id]);
});

Route::get('/program-study', function () {
    return view('v_program_study');
});



Route::get('/contact', function () {
    return view('v_contact');
});

