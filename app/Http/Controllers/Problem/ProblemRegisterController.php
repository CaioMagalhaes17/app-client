<?php

namespace App\Http\Controllers\Problem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class ProblemRegisterController extends Controller
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

    public function edit(Request $request) : JsonResponse {
        try {
            return Response::json(
                ($this->business->edit($request)),
                ResponseHttpCode::HTTP_CREATED
            );
        } catch (\App\Business\Problem\Exception\ProblemNotEditedException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function delete(Request $request) : JsonResponse {
        try {
            return Response::json(
                ($this->business->delete($request)),
                ResponseHttpCode::HTTP_OK
            );
        } catch (\App\Business\Problem\Exception\ProblemNotExcludedException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }
}