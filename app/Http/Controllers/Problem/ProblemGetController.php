<?php

namespace App\Http\Controllers\Problem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProblemGetController extends Controller
{
    public function getAll(Request $request)
    {
        return $this->business->getAll($request);
    }

    public function getById(string $idProblem){
       return $this->business->getById($idProblem);
    }
}