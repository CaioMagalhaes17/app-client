<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class BudgetAcceptController extends Controller{

    public function acceptBudget(Request $request) : JsonResponse{
        try {
            return Response::json(
                ($this->business->acceptBudget($request)),
                ResponseHttpCode::HTTP_ACCEPTED
            );
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        } catch (\App\Business\Budget\Exception\BudegtAlreadyAcceptedException $e) {
            abort(ResponseHttpCode::HTTP_CONFLICT , $e->getMessage());
        } catch (\App\Business\Budget\Exception\BudgetNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NOT_FOUND , $e->getMessage());
        }   
    }
}