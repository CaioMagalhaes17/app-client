<?php

namespace App\Business\Budget\Exception;

use Exception;

class BudgetsAcceptedNotFoundException extends Exception {
    public function __construct(){
        parent::__construct('Nenhum orçamento aceito foi encontrado');
    }
}