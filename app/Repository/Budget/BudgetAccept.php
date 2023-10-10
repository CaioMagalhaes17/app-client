<?php

namespace App\Repository\Budget;

use App\Business\Budget\Exception\BudegtAlreadyAcceptedException;
use App\Business\Budget\Exception\BudgetNotFoundException;
use App\Models\Problem\Budget;

class BudgetAccept
{
    public Budget $model;

    public function __construct()
    {
        $this->model = new Budget();
    }

    public function acceptBudget(Budget $budget) : bool
    {
        $budget->accepted_budget = 'V';
        return $budget->save();
    }
}
