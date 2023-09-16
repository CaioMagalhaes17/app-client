<?php

namespace App\Business\Budget\Exception;

use Exception;

class BudgetNotFoundException extends Exception {
    public function __construct(){
        parent::__construct('Não foi possível encontar um orçamento');
    }
}