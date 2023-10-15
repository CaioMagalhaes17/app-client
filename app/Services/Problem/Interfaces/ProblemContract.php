<?php

namespace App\Services\Problem\Interfaces;

use App\Business\Problem\DTO\ProblemEditDTO;
use App\Business\Problem\DTO\ProblemRegisterDTO;
use Illuminate\Support\Collection;

interface ProblemContract {
    public function register(ProblemRegisterDTO $problemData) : bool;

    public function edit(ProblemEditDTO $problemData) : bool;

    public function delete(string $idProblem, string $idUser) : bool;

    public function getById(string $idProblem) : Collection;
}