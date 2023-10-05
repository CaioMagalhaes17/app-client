<?php

namespace App\Business\Budget;

use App\Business\Business;
use App\Business\Problem\ProblemGet;
use app\Exceptions\UserNotAuthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Problem\Problem as ProblemModel;

class BudgetAccept {
    
    use Business;

    public function acceptBudget(Request $request){
        $request->only('idBudget');
        $this->userHasPermission($request->idBudget);
        $budget = $this->repository->acceptBudget($request->idBudget);
        if ($budget){
            Log::channel('budgetAccepted')->info('[CLIENT API] Budget accepted: ' . $budget . ' - User ID: ' . Auth::user()->id);
        }
    }

    private function userHasPermission($idBudget){
        $problems = (new ProblemGet)->getAll();
        if (!$problems->isEmpty()){
            foreach ($problems as $problem){
                foreach ($problem->budget as $budget){
                    if (!empty($budget) && $budget->id_budget == $idBudget){
                        return $problem->fk_id_client_problem == Auth::user()->id ? true : throw new UserNotAuthorizedException;
                    }
                }
            }
        }
        
    }
}