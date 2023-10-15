<?php

namespace App\Http\Controllers\Problem;

use App\Business\Problem\DTO\ProblemEditDTO;
use App\Business\Problem\DTO\ProblemRegisterDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Problem\ProblemRegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProblemController extends Controller
{
    public function register(ProblemRegisterRequest $request) : JsonResponse {
        try {
            $request->only('brand', 'usage_time', 'model', 'desc');
            return Response::json(
                ($this->business->register(
                    (new ProblemRegisterDTO(
                        $request->brand,
                        $request->usage_time,
                        $request->model,
                        $request->description,
                        Auth::User()->id
                    ))
                )),
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
                ($this->business->edit(
                    (new ProblemEditDTO(
                        $request->brand,
                        $request->usage_time,
                        $request->model,
                        $request->description,
                        $idProblem,
                        Auth::User()->id
                    ))
                )),
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