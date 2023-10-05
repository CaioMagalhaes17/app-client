<?php

namespace App\Repository\Budget;

use App\Business\Budget\Exception\BudegtAlreadyAcceptedException;
use App\Business\Budget\Exception\BudgetNotFoundException;
use App\Models\Problem\Budget;

class BudgetAccept {
    public Budget $model;

    public function __construct(){
        $this->model = new Budget();
    }

    public function acceptBudget(string $idBudget) : Budget{
        $budget = $this->model->find($idBudget);
        if (!empty($budget)){
            if ($budget->accepted_budget != 'V'){
                $budget->accepted_budget = 'V';
                $budget->save();
                return $budget;
            }
            throw new BudegtAlreadyAcceptedException;
        }
        throw new BudgetNotFoundException; 
    }
}