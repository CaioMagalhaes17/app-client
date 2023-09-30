<?php

namespace App\Http\Controllers\Problem;

use App\Business\Problem\Problem;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Problem\ProblemIndexResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class ProblemGetController extends Controller
{
    public function getAll() : JsonResponse {
        try {
            return Response::json(
                new ProblemIndexResource($this->business->getAll()),
                ResponseHttpCode::HTTP_OK);
        } catch (\App\Business\Problem\Exception\ProblemsNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }

    public function getById(string $idProblem) : JsonResponse {
       try {
        (new Problem)->userHasPermission($idProblem);
        return Response::json(
            new ProblemIndexResource($this->business->getById($idProblem)),
            ResponseHttpCode::HTTP_OK
        );
        } catch (\App\Business\Problem\Exception\ProblemNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (\App\Exceptions\UserNotAuthorizedException $e) {
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }
}