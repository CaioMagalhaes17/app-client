<?php

namespace App\Business\Budget\Exception;

use Exception;

class BudegtAlreadyAcceptedException extends Exception {
    public function __construct(){
        parent::__construct('Orçamento já foi aceito');
    }
}