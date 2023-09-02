<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;

class BudgetGetController extends Controller{

    public function getByIdProblem(string $idProblem){
        return $this->business->getByIdProblem($idProblem);
    }
}