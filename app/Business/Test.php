<?php

namespace App\Business;

use App\Business\Business;

class Test
{
    use Business;

    public function test()
    {
        return $this->repository->test();
    }
}