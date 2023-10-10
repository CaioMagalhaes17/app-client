<?php

namespace App\Repository\Problem;

use App\Business\Problem\Exception\ProblemNotFoundException;
use App\Business\Problem\Exception\ProblemsNotFoundException;
use Illuminate\Support\Collection;

class ProblemGet extends Problem {
    public function getAll(string $idUser) : Collection {
        return $this->model->where('fk_id_client_problem', $idUser)->get(); 
    }

    public function getById(string $problemId) : Collection {
        return $this->model->where('id_problem', $problemId)->get();
    }
}