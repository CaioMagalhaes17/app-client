<?php

namespace App\Business\Budget\Exception;

use Exception;

class NoneBudgetsFoundException extends Exception {
    public function __construct(){
        parent::__construct('Nenhum orçamento foi encontrado');
    }
}