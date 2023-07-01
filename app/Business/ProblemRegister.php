<?php

namespace App\Business;

use App\Business\Business;
use Illuminate\Http\Request;

class ProblemRegister
{
    use Business;

    public function register(Request $request)
    {   
        $request->only('brand', 'usage_time', 'model', 'desc');
        return $this->repository->register($request);
    }
}       