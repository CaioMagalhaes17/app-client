<?php

namespace App\Repository\Problem;

use App\Models\Problem\Problem as ProblemModel;

class Problem {

    public ProblemModel $model;

    public function __construct(){
        $this->model = new ProblemModel;
    }

}