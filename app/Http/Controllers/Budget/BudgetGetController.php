<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use App\Http\Resources\Budget\BudgetAcceptedResource;
use App\Http\Resources\Budget\BudgetByProblemIdResource;
use App\Http\Resources\Budget\BudgetIndexResource;

class BudgetGetController extends Controller{

    public function getAllBudgets() : BudgetIndexResource{
        return new BudgetIndexResource($this->business->getAllBudgets());
    }

    public function getByProblemId(string $idProblem) : BudgetByProblemIdResource{
        return new BudgetByProblemIdResource($this->business->getByProblemId($idProblem));
    }

    public function getAcceptedBudgets() : BudgetAcceptedResource{
        return new BudgetAcceptedResource($this->business->getAcceptedBudgets());
    }

    public function getOldAcceptedBudgets() : BudgetAcceptedResource{
        return new BudgetAcceptedResource($this->business->getOldAcceptedBudgets());
    }
}