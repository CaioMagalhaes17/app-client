<?php

namespace App\Repository;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemRegister
{
    public function register(Request $request, string $userId)
    {
        $problem = (new Problem);
        $problem->brand_problem = $request->brand;
        $problem->usage_time_problem = $request->usage_time;
        $problem->model_problem = $request->model;
        $problem->desc_problem = $request->desc;
        $problem->fk_id_client_problem = $userId;
        $problem->save();   
    }
}