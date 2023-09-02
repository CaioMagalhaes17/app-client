<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ProblemRegister extends Problem
{
    use Business;

    public function register(Request $request)
    {   
        $request->only('brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        return $this->repository->register($request, Auth::user()->id);
    }

    public function edit(Request $request){
        $request = $request->only('id_problem','brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        $this->userHasPermission($request['id_problem']);
        return $this->repository->edit($request);
    }

    public function delete(Request $request){
        $request->only('id_problem');
        $this->userHasPermission($request->id_problem);
        return $this->repository->delete($request->id_problem);
    }
}