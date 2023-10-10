<?php

namespace App\Repository\Problem;

use App\Models\Problem\Problem as ProblemModel;
use Illuminate\Http\Request;

class ProblemRegister extends Problem
{
    public function register(array $data) : ProblemModel
    {
        $this->model->brand_problem = $data['brand_problem'];
        $this->model->usage_time_problem = $data['usage_time_problem'];
        $this->model->model_problem = $data['model_problem'];
        $this->model->desc_problem = $data['desc_problem'];
        $this->model->fk_id_client_problem = $data['user_id'];
        $this->model->save();
        return $this->model;
    }

    public function edit(array $data, string $idProblem) : bool {
        return $this->model->where('id_problem', $idProblem)->update($data);
    }

    public function delete(string $idProblem) : bool {
        return $this->model->where('id_problem', $idProblem)->delete($idProblem);
    }
}