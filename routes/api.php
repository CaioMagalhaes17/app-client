<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Problem\ProblemRegisterController;
use App\Http\Controllers\Problem\ProblemGetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [LoginController::class, 'userRegister']);
    Route::post('login', [LoginController::class, 'userLogin']);
});

Route::group(['prefix' => 'problem'], function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('register', [ProblemRegisterController::class, 'register']);
        Route::post('edit', [ProblemRegisterController::class, 'edit']);
        Route::delete('', [ProblemRegisterController::class, 'delete']);
        Route::get('', [ProblemGetController::class, 'getAll']);
        Route::get('{idProblem}', [ProblemGetController::class, 'getById']);
    });
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
});
