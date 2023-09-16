<?php

namespace App\Business\Problem\Exception;

use Exception;

class ProblemsNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Não foram encontrados problemas com esse ID de usuário");
    }
}
