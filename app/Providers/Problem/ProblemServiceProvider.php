<?php

namespace App\Providers\Problem;

use App\Services\Problem\Interfaces\ProblemContract;
use App\Services\Problem\Problem;
use App\Services\Problem\ProblemService;
use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProblemContract::class, function ($app) {
            return new Problem();
        });
    }
}
