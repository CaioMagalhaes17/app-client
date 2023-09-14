<?php

namespace App\Business\Budget;

use App\Business\Business;
use App\Business\Problem\Problem;
use App\Business\Problem\ProblemGet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class BudgetGet {
    
    use Business;

    public function getAllBudgets(): Collection {
        $problems = (new ProblemGet())->getAll();
        if (!$problems->isEmpty()){
            foreach ($problems as $problem){
                (new Problem)->userHasPermission($problem->id_problem);
                if (!$problem->budget->isEmpty()){
                    $budgets[] = $problem->budget;
                }
            }
            return collect($budgets);
        }
    }

    public function getByProblemId(string $idProblem){
        (new Problem)->userHasPermission($idProblem);
        $problem = (new ProblemGet())->getById($idProblem);
        if (!$problem->isEmpty()){
            return $problem[0]->budget;
        }
    }

    public function getAcceptedBudgets(){
        $problems = (new ProblemGet())->getAll();
        if (!$problems->isEmpty()){
            foreach ($problems as $problem){
                if (!$problem->budget->isEmpty()){
                    (new Problem)->userHasPermission($problem->id_problem);
                    foreach ($problem->budget as $budget){
                        if ($budget->accepted_budget == 'V'){
                            $budgets[] = $budget;
                        }
                    }
                }
            }
            return collect($budgets);
        }
    }
}