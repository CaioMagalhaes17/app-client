<?php

namespace App\Providers\Problem;

use App\Services\Problem\ProblemRegister;
use App\Services\Problem\ProblemRegisterService;
use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProblemRegisterService::class, function ($app) {
            return new ProblemRegister();
        });
    }
}
