<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudgetAcceptController extends Controller{

    public function acceptBudget(Request $request){
        return $this->business->acceptBudget($request);
    }
}