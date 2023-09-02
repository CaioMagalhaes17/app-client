<?php

namespace App\Repository\Problem;

class ProblemGet extends Problem {
    public function getAll($idUser){
        return $this->model->where('fk_id_client_problem',$idUser)->get();
    }

    public function getById(string $problemId){
        return $this->model->where('id_problem', $problemId)->get();
    }
}