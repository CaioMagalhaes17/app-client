<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Support\Facades\Auth;

class ProblemGet {
    
    use Business;

    public function getAll(){
        return $this->repository->getAll(Auth::user()->id);
    }

    public function getById(string $problemId){
        return $this->repository->getById($problemId);
    }
}