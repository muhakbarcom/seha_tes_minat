<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\IndikatorController;
use App\Http\Controllers\Api\SkorController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\InfoController;


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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::post('users', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);


Route::post('/register', [AuthController::class, 'register']);

Route::get('/indikator/{aspek}', [IndikatorController::class, 'getByAspekType']);
Route::get('/skor', [SkorController::class, 'getAll']);

Route::post('/report/getResult', [ReportController::class, 'getResult']);
Route::post('/report/getResultByCodeTest', [ReportController::class, 'getResultByCodeTest']);

Route::get('/info/{type}', [InfoController::class, 'getByType']);
Route::get('/info', [InfoController::class, 'getAll']);




// Route::apiResource('users', UserController::class);