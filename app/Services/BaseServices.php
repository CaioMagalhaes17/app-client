<?php

namespace App\Services;

trait BaseServices
{
    private $repository;

    public function __construct()
    {
        $class = '\App\Repository\\' . str_replace('App\Services\\', '', get_class($this));
        if (class_exists($class)) {
            $interfaceName = substr($class, 1);
            $this->repository = app()->make($interfaceName);
        }
    }
}