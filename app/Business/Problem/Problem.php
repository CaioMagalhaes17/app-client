<?php

namespace App\Business\Problem;

use Illuminate\Support\Facades\Auth;

class Problem {

    public function userHasPermission(string $idProblem){
        $problem = (new ProblemGet)->getById($idProblem);
        if ($problem[0]->fk_id_client_problem == Auth::user()->id){
            return true;
        }
        throw new UserNotAuthorizedException();
    }
}