<?php

namespace App\Services\Problem;

use App\Business\Problem\DTO\ProblemEditDTO;
use App\Business\Problem\DTO\ProblemRegisterDTO;
use Illuminate\Support\Facades\Log;
use App\Services\BaseServices;
use App\Services\Problem\Interfaces\ProblemContract;
use Illuminate\Support\Collection;

class Problem implements ProblemContract
{
    use BaseServices;

    public function register(ProblemRegisterDTO $problemData) : bool{
        $problemCreated = $this->repository->register($problemData);
        if ($problemCreated){
            Log::channel('problemCreated')->info('[CLIENT API] Problem created: ' . $problemCreated . ' - User ID: ' . $problemData->getUserId());
            return true;
        }
    }

    public function edit(ProblemEditDTO $problemData) : bool{
        $problemEdited = $this->repository->edit($problemData);
        if ($problemEdited){
            Log::channel('problemEdited')->info('[CLIENT API] Problem edited: ' . $problemEdited . ' - User ID: ' .  $problemData->getUserId());
            return true;
        }
    }

    public function delete(string $idProblem, string $idUser) : bool {
        if ($this->repository->delete($idProblem)){
            Log::channel('problemDeleted')->info('[CLIENT API] Problem deleted ID: ' . $idProblem . ' - User ID: ' . $idUser);
            return true;
        }
    }

    public function getById(string $idProblem) : Collection{
        return $this->repository->getById($idProblem);
    }
}