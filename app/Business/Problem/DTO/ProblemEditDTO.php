<?php

namespace App\Business\Problem\DTO;

class ProblemEditDTO {

    public function __construct(
        private string $model = '',
        private string $brand = '',
        private string $description = '',
        private string $usageTime = '',
        private string $problemId,
        private string $userId
    ){}

    public function getProblemModel() : string{
        return $this->model;
    }

    public function getProblemBrand() : string{
        return $this->brand;
    }

    public function getProblemDescription() : string{
        return $this->description;
    }

    public function getProblemUsageTime() : string{
        return $this->usageTime;
    }

    public function getProblemId() : string {
        return $this->problemId;
    }

    public function getUserId() : string {
        return $this->userId;
    }
}