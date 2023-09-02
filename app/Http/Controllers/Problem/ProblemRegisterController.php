<?php

namespace App\Http\Controllers\Problem;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProblemRegisterController extends Controller
{
    public function register(Request $request)
    {
        return $this->business->register($request);
    }

    public function edit(Request $request)
    {
        return $this->business->edit($request);
    }

    public function delete(Request $request){
        return $this->business->delete($request);
    }
}