<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ProblemRegister extends Problem
{
    use Business;

    public function register(Request $request) : bool
    {   
        $request->only('brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        return $this->repository->register($request, Auth::user()->id);
    }

    public function edit(Request $request, string $idProblem) : bool{
        $data = $request->only('brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        $this->userHasPermission($idProblem);
        return $this->repository->edit($data, $idProblem);
    }

    public function delete(string $idProblem) : bool{
        $this->userHasPermission($idProblem);
        return $this->repository->delete($idProblem);
    }
}