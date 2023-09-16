<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use App\Http\Resources\Budget\BudgetAcceptedResource;
use App\Http\Resources\Budget\BudgetByProblemIdResource;
use App\Http\Resources\Budget\BudgetIndexResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class BudgetGetController extends Controller{

    public function getAllBudgets() : JsonResponse{
        try {
            return Response::json (
                new BudgetIndexResource($this->business->getAllBudgets()),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Exceptions\UserNotAuthorizedException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function getByProblemId(string $idProblem) : JsonResponse{
        try {
            return Response::json (
                new BudgetByProblemIdResource($this->business->getByProblemId($idProblem)),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Exceptions\UserNotAuthorizedException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function getAcceptedBudgets() : JsonResponse{
        try {
            return Response::json (
                new BudgetAcceptedResource($this->business->getAcceptedBudgets()),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Exceptions\UserNotAuthorizedException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function getOldAcceptedBudgets() : JsonResponse{
        try {
            return Response::json (
                new BudgetAcceptedResource($this->business->getOldAcceptedBudgets()),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Exceptions\UserNotAuthorizedException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }
}