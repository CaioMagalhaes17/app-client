<?php

namespace App\Repository\Problem;

use Illuminate\Http\Request;

class ProblemRegister extends Problem
{
    public function register(Request $request, string $userId)
    {
        $this->model->brand_problem = $request->brand_problem;
        $this->model->usage_time_problem = $request->usage_time_problem;
        $this->model->model_problem = $request->model_problem;
        $this->model->desc_problem = $request->desc_problem;
        $this->model->fk_id_client_problem = $userId;
        $this->model->save();   
    }

    public function edit(array $data, string $idProblem) : bool {
        return $this->model->where('id_problem', $idProblem)->update($data);
    }

    public function delete(string $idProblem) : bool {
        return $this->model->where('id_problem', $idProblem)->delete($idProblem);
    }
}