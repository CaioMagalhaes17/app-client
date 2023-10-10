<?php

namespace App\Business\Problem;

use App\Business\Business;
use App\Business\Problem\Exception\ProblemNotFoundException;
use App\Business\Problem\Exception\ProblemsNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ProblemGet {
    
    use Business;

    public function getAll() : Collection {
        $problems = $this->repository->getAll(Auth::user()->id);
        return (!$problems->isEmpty() ? $problems :  throw new ProblemsNotFoundException);
    }

    public function getById(string $problemId) : Collection { 
        $problems = $this->repository->getById($problemId);
        return (!$problems->isEmpty() ? $problems :  throw new ProblemNotFoundException);
    }
}