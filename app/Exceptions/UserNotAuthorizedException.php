<?php

namespace app\Exceptions;   

use Exception;

class UserNotAuthorizedException extends Exception{
    public function __construct()
    {
        parent::__construct("Usuário Não autenticado");
    }
}