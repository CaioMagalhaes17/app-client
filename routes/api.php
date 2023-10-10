<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Budget\BudgetAcceptController;
use App\Http\Controllers\Budget\BudgetGetController;
use App\Http\Controllers\Problem\ProblemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['prefix' => 'client'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::post('register', [LoginController::class, 'userRegister']);
        Route::post('login', [LoginController::class, 'userLogin']);
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['prefix' => 'problem', 'middleware' => 'log.problem.endpoint'], function () {
            Route::post('register', [ProblemController::class, 'register']);
            Route::post('edit/{idProblem}', [ProblemController::class, 'edit']);
            Route::delete('{idProblem}', [ProblemController::class, 'delete']);
            Route::get('', [ProblemController::class, 'getAll']);
            Route::get('{idProblem}', [ProblemController::class, 'getById']);
        });

        Route::group(['prefix' => 'budget', 'middleware' => 'log.budget.endpoint'], function () {
            Route::post('accept', [BudgetAcceptController::class, 'acceptBudget']);
            Route::get('problemId/{idProblem}', [BudgetGetController::class, 'getByProblemId']);
            Route::get('', [BudgetGetController::class, 'getAllBudgets']);
            Route::get('accepted/active', [BudgetGetController::class, 'getAcceptedBudgets']);
            Route::get('accepted/inactive', [BudgetGetController::class, 'getInactiveAcceptedBudgets']);
        });
    });

    Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    });
});
