<?php

namespace App\Business\Budget;

use App\Business\Business;
use App\Business\Problem\ProblemGet;
use Illuminate\Support\Facades\Auth;

class BudgetGet {
    
    use Business;

    public function getByIdProblem(string $idProblem){
        $problem = (new ProblemGet())->getById($idProblem);
        if (!$problem->isEmpty()){
            return $problem[0]->budget;
        }
    }
}