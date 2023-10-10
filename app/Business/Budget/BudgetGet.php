<?php

namespace App\Business\Budget;

use App\Business\Budget\Exception\BudgetNotFoundException;
use App\Business\Budget\Exception\BudgetsAcceptedNotFoundException;
use App\Business\Budget\Exception\NoneBudgetsFoundException;
use App\Business\Business;
use App\Business\Problem\Problem;
use App\Business\Problem\ProblemGet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Problem\Budget as BudgetModel;

class BudgetGet {
    
    use Business;

    public function getAllBudgets(): Collection {
        $problems = (new ProblemGet())->getAll();
        if (!$problems->isEmpty()){
            foreach ($problems as $problem){
                if (!$problem->budget->isEmpty()){
                    $budgets[] = $problem->budget;
                }
            }
            return !empty($budgets) ? collect($budgets) : throw new NoneBudgetsFoundException;
        }
    }

    public function getByProblemId(string $idProblem){
        (new Problem)->userHasPermission($idProblem);
        $problem = (new ProblemGet())->getById($idProblem);
        if (!$problem->isEmpty()){
            return $problem[0]->budget;
        }
        throw new BudgetNotFoundException;
    }

    public function getAcceptedBudgets(){
        $allBudgets = $this->getAllBudgets();
        foreach ($allBudgets as $budget){
            foreach ($budget as $value){
                if ($value->accepted_budget == 'V'){
                    $return[] = $value;
                }
            }
        }
        return $return;
    }

    public function getBudgetById(string $idBudget){
        return (new BudgetModel)::find($idBudget) ?? throw new BudgetNotFoundException;
    }
}