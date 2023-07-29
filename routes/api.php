<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\ProblemRegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [LoginController::class, 'userRegister']);
    Route::post('login', [LoginController::class, 'userLogin']);
});

Route::group(['middleware' => 'auth:sanctum'] , function () {
    Route::post('problem/register', [ProblemRegisterController::class, 'register']);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
});
