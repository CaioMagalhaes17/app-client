<?php

namespace App\Business\Problem\Exception;

use Exception;

class ProblemNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Não foi possível encontrar problemas com esse ID de usuário");
    }
}
