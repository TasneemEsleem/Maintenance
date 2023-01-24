<?php

use App\Http\Controllers\Api\AuthApiControllers;
use App\Http\Controllers\Api\RepairController as ApiRepairController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('auth')->group(function () {
    Route::post('register', [AuthApiControllers::class, 'register']);
    Route::post('login', [AuthApiControllers::class, 'login']);
    Route::post('forget-password', [AuthApiControllers::class, 'forgetPassword']);
    Route::post('reset-password', [AuthApiControllers::class, 'resetPassword']);

});

Route::prefix('auth')->middleware('auth:user-api')->group(function () {
    Route::post('change-password', [AuthApiControllers::class, 'changePassword']);
    Route::get('logout', [AuthApiControllers::class, 'logout']);
    Route::get('repairs/index', [ApiRepairController::class, 'index']);
    Route::post('repairs/store', [ApiRepairController::class, 'store']);


});
