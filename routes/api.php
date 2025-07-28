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
use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\TeamController;

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

// Public Games API
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show']);

// Public Teams API
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::get('/teams/{id}/games/upcoming', [TeamController::class, 'upcomingGames']);
Route::get('/teams/{id}/games/past', [TeamController::class, 'pastGames']);
Route::get('/teams/{id}/players', [TeamController::class, 'players']);

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('request-otp', [AuthController::class,'requestOTP']);
    Route::post('device',[DevicesController::class,'store']);
    Route::get('/notifications',[NotificationController::class,'index']);
});





