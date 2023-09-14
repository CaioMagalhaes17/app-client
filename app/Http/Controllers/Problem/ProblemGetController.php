<?php

namespace App\Http\Controllers\Problem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Problem\ProblemIndexResource;

class ProblemGetController extends Controller
{
    public function getAll(Request $request) : ProblemIndexResource
    {
        return new ProblemIndexResource($this->business->getAll($request));
    }

    public function getById(string $idProblem) : ProblemIndexResource{
       return new ProblemIndexResource($this->business->getById($idProblem));
    }
}