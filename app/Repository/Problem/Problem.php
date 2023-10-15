<?php

namespace App\Repository\Problem;

use App\Business\Problem\DTO\ProblemEditDTO;
use App\Business\Problem\DTO\ProblemRegisterDTO;
use App\Models\Problem\Problem as ProblemModel;
use Illuminate\Support\Collection;

class Problem {

    public ProblemModel $model;

    public function __construct(){
        $this->model = new ProblemModel;
    }

    public function getAll(string $idUser) : Collection {
        return $this->model->where('fk_id_client_problem', $idUser)->get(); 
    }

    public function getById(string $problemId) : Collection {
        return $this->model->where('id_problem', $problemId)->get();
    }

    public function register(ProblemRegisterDTO $problemData) : ProblemModel
    {
        $this->model->brand_problem = $problemData->getProblemBrand();
        $this->model->usage_time_problem = $problemData->getProblemUsageTime();
        $this->model->model_problem = $problemData->getProblemModel();
        $this->model->desc_problem =  $problemData->getProblemDescription();
        $this->model->fk_id_client_problem = $problemData->getUserId();
        $this->model->save();
        return $this->model;
    }

    public function edit(ProblemEditDTO $problemData) : ProblemModel {
        $problem = $this->model->find($problemData->getProblemId());
        $problem->model_problem = !empty($problemData->getProblemModel()) ? $problemData->getProblemModel() : $problem->model_problem;
        $problem->usage_time_problem = !empty($problemData->getProblemUsageTime()) ? $problemData->getProblemUsageTime() : $problem->usage_time_problem;
        $problem->brand_problem = !empty($problemData->getProblemBrand()) ? $problemData->getProblemBrand() : $problem->brand_problem;
        $problem->desc_problem = !empty($problemData->getProblemDescription()) ? $problemData->getProblemDescription() : $problem->desc_problem;
        $problem->save();
        return $problem;
    }

    public function delete(string $idProblem) : bool {
        return $this->model->where('id_problem', $idProblem)->delete($idProblem);
    }

}