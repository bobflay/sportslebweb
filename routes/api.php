<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DevicesController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CheckinController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('verify-otp', [AuthController::class,'verifyOTP']);

Route::get('/posts',[PostController::class,'index']);

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('request-otp', [AuthController::class,'requestOTP']);
    Route::post('device',[DevicesController::class,'store']);
    Route::get('/notifications',[NotificationController::class,'index']);
});





