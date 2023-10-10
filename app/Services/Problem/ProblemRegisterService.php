<?php

namespace App\Services\Problem;

interface ProblemRegisterService {
    public function register(array $data) : bool;
}