<?php

namespace App\Business\Problem\Exception;

use Exception;

class ProblemNotCreatedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Não foi possível criar um problema");
    }
}