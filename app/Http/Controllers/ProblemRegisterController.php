<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProblemRegisterController extends Controller
{
    public function register(Request $request)
    {
        return $this->business->register($request);
    }
}
