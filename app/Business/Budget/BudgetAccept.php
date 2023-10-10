<?php

namespace App\Business\Budget;

use App\Business\Budget\Exception\BudegtAlreadyAcceptedException;
use App\Business\Business;
use App\Business\Problem\ProblemGet;
use app\Exceptions\UserNotAuthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Problem\Budget as BudgetModel;

class BudgetAccept {
    
    use Business;

    public function acceptBudget(Request $request) : void{
        $request->only('idBudget');
        $this->userHasPermission($request->idBudget);
        $budget = (new BudgetGet)->getBudgetById($request->idBudget);
        if (!$this->isBudgetAccepted($budget)){
            if ($this->repository->acceptBudget($budget)){
                Log::channel('budgetAccepted')->info('[CLIENT API] Budget accepted: ' . $budget . ' - User ID: ' . Auth::user()->id);
            }
        }
    }

    private function userHasPermission(string $idBudget){
        $budget = (new BudgetGet)->getBudgetById($idBudget);
        $problem = (new ProblemGet)->getById($budget->fk_id_problem);
        return $problem[0]->fk_id_client == Auth::user()->id ? true : throw new UserNotAuthorizedException;
    }

    private function isBudgetAccepted(BudgetModel $budget){
       return ($budget->accepted_budget == 'V' ? throw new BudegtAlreadyAcceptedException : false);
    }
}