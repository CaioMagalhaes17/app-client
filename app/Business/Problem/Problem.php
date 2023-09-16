<?php

namespace App\Business\Problem;

use app\Exceptions\UserNotAuthorizedException;
use Illuminate\Support\Facades\Auth;

class Problem {

    public function userHasPermission(string $idProblem) : bool{
        $problem = (new ProblemGet)->getById($idProblem);
        if ($problem[0]->fk_id_client_problem == Auth::user()->id){
            return true;
        }
        throw new UserNotAuthorizedException();
    }
}