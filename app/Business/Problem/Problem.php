<?php

namespace App\Business\Problem;

use App\Business\Business;
use App\Business\Problem\DTO\ProblemEditDTO;
use App\Business\Problem\DTO\ProblemRegisterDTO;
use app\Exceptions\UserNotAuthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Problem\Problem as ProblemModel;
use App\Services\Problem\Interfaces\ProblemContract;
use Illuminate\Support\Collection;

class Problem
{
    use Business;

    public function register(ProblemRegisterDTO $problemData) : bool
    {   
        return app()->make(ProblemContract::class)->register($problemData);
    }

    public function edit(ProblemEditDTO $problemData) : bool{
        $this->userHasPermission($problemData->getProblemId());
        return app()->make(ProblemContract::class)->edit($problemData);
    }

    public function delete(string $idProblem) : bool{
        $this->userHasPermission($idProblem);
        return app()->make(ProblemContract::class)->delete($idProblem, Auth::User()->id);
    }

    public function userHasPermission(string $idProblem) : bool{
        $problem = $this->getById($idProblem);
        if ($problem[0]->fk_id_client_problem == Auth::user()->id){
            return true;
        }
        throw new UserNotAuthorizedException();
    }

    public function getById(string $idProblem) : Collection {
        return app()->make(ProblemContract::class)->getById($idProblem);
    }
}