<?php

namespace App\Business\Problem\Exception;

use Exception;

class ProblemNotEditedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Não foi possível editar um problema");
    }
}
