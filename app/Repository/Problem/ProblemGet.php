<?php

namespace App\Repository\Problem;

use App\Business\Problem\Exception\ProblemNotFoundException;
use App\Business\Problem\Exception\ProblemsNotFoundException;

class ProblemGet extends Problem {
    public function getAll(string $idUser){
        $problems = $this->model->where('fk_id_client_problem', $idUser)->get();
        if (!$problems->isEmpty()){
            return $problems;
        }
        throw new ProblemsNotFoundException();
    }

    public function getById(string $problemId){
        $problem = $this->model->where('id_problem', $problemId)->get();
        if  (!$problem->isEmpty()){
            return $problem;
        }
        throw new ProblemNotFoundException();
    }
}