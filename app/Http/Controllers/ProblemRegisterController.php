<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProblemRegisterController extends Controller
{
    public function register(Request $request)
    {
        die('321');
        return $this->business->register($request);
    }
}
