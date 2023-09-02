<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;

class BudgetGetController extends Controller{

    public function getAllBudgets(){
        return $this->business->getAllBudgets();
    }

    public function getByIdProblem(string $idProblem){
        return $this->business->getByIdProblem($idProblem);
    }

    public function getAcceptedBudgets(){
        return $this->business->getAcceptedBudgets();
    }

    public function getOldAcceptedBudgets(){
        return $this->business->getOldAcceptedBudgets();
    }
}