<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Problem\Problem as ProblemModel;

class ProblemRegister extends Problem
{
    use Business;

    public function register(Request $request) : bool
    {   
        $request->only('brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        $problemCreated = $this->repository->register($request, Auth::user()->id);
        if ($problemCreated){
            Log::channel('problemCreated')->info('[CLIENT API] Problem created: ' . $problemCreated . ' - User ID: ' . Auth::user()->id);
            return true;
        }
    }

    public function edit(Request $request, string $idProblem) : bool{
        $data = $request->only('brand_problem', 'usage_time_problem', 'model_problem', 'desc_problem');
        $this->userHasPermission($idProblem);
        if ($this->repository->edit($data, $idProblem)){
            Log::channel('problemEdited')->info('[CLIENT API] Problem edited: ' . ProblemModel::find($idProblem) . ' - User ID: ' . Auth::user()->id);
            return true;
        }
    }

    public function delete(string $idProblem) : bool{
        $this->userHasPermission($idProblem);
        if ($this->repository->delete($idProblem)){
            Log::channel('problemDeleted')->info('[CLIENT API] Problem deleted ID: ' . $idProblem . ' - User ID: ' . Auth::user()->id);
            return true;
        }
    }
}