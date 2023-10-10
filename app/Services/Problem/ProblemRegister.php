<?php

namespace App\Services\Problem;

use Illuminate\Support\Facades\Log;
use App\Services\BaseServices;
use Illuminate\Support\Facades\Auth;

class ProblemRegister implements ProblemRegisterService
{
    use BaseServices;

    public function register(array $data) : bool{
        $problemCreated = $this->repository->register($data);
        if ($problemCreated){
            Log::channel('problemCreated')->info('[CLIENT API] Problem created: ' . $problemCreated . ' - User ID: ' . $data['user_id']);
            return true;
        }
    }
}