<?php

namespace App\Business\Problem\Exception;

use Exception;

class ProblemNotExcludedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Não foi possível excluir o problema");
    }
}
