<?php

namespace App\Business\Problem;

use App\Business\Business;
use app\Exceptions\UserNotAuthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Problem\Problem as ProblemModel;
use App\Services\Problem\ProblemRegisterService;

class Problem
{
    use Business;

    public function register(Request $request) : bool
    {   
        $problemData = $request->only('brand', 'usage_time', 'model', 'desc');
        $problemData = $this->setDataToRegisterProblem($problemData);

        return app()->make(ProblemRegisterService::class)->register($problemData);
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

    public function setDataToRegisterProblem(array $problemData) : array {
        $dataReturn = array();
        foreach ($problemData as $key => $value){
            $dataReturn[$key . '_problem'] = $value;
        }
        $dataReturn['user_id'] = Auth::user()->id;
        return $dataReturn;
    }

    public function userHasPermission(string $idProblem) : bool{
        $problem = (new ProblemGet)->getById($idProblem);
        if ($problem[0]->fk_id_client_problem == Auth::user()->id){
            return true;
        }
        throw new UserNotAuthorizedException();
    }
}