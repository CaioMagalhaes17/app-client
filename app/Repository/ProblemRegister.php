<?php

namespace App\Repository;

use App\Models\Problem;

class ProblemRegister
{
    private $sufix = 'problem';

    public function register($request)
    {
        $problem = (new Problem);
        $problem->brand_problem = $request->brand;
        $problem->usage_time_problem = $request->usage_time;
        $problem->model_problem = $request->model;
        $problem->desc_problem = $request->desc;
        //  $this->fk_id_client . '_' . $this->sufix = $problem->id_client;
        $problem->save();   
    }
}