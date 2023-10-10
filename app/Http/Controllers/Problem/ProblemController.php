<?php

namespace App\Http\Controllers\Problem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class ProblemController extends Controller
{
    public function register(Request $request) : JsonResponse {
        try {
            return Response::json(
                ($this->business->register($request)),
                ResponseHttpCode::HTTP_CREATED
            );
        } catch (\App\Business\Problem\Exception\ProblemNotCreatedException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function edit(Request $request, string $idProblem) : JsonResponse {
        try {
            return Response::json(
                ($this->business->edit($request, $idProblem)),
                ResponseHttpCode::HTTP_CREATED
            );
        } catch (\App\Business\Problem\Exception\ProblemNotEditedException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function delete(string $idProblem) : JsonResponse {
        try {
            return Response::json(
                ($this->business->delete($idProblem)),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Business\Problem\Exception\ProblemNotExcludedException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }
}