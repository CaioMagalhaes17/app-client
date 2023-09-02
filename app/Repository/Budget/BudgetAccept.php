<?php

namespace App\Repository\Budget;

use App\Models\Problem\Budget;

class BudgetAccept {
    public Budget $model;

    public function __construct(){
        $this->model = new Budget();
    }

    public function acceptBudget(string $idBudget){
        $budget = $this->model->find($idBudget);

        $budget->accepted_budget = 'V';
        $budget->save();
    }
}