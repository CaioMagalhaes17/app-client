<?php

namespace App\Business;

trait Business
{
    private $repository;


    public function __construct()
    {
        $class = '\App\Repository\\' . str_replace('App\Business\\', '', get_class($this));
        if (class_exists($class)) {
            $interfaceName = substr($class, 1);
            $this->repository = app()->make($interfaceName);
        }
    }
}