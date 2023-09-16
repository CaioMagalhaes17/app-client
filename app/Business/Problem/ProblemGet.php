<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ProblemGet {
    
    use Business;

    public function getAll() : Collection {
        return $this->repository->getAll(Auth::user()->id);
    }

    public function getById(string $problemId) : Collection { 
        return $this->repository->getById($problemId);
    }
}