<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;

class MajorService implements MajorServiceInterface
{
    private $majorDao;
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    public function getMajorList()
    {
        return $this->majorDao->getMajorList();
    }
    public function saveMajor($validated)
    {
        return $this->majorDao->saveMajor($validated);
    }
    public function updateMajor($validated, $id)
    {
        return $this->majorDao->updateMajor($validated, $id);
    }
    public function deleteMajor($major)
    {
        return $this->majorDao->deleteMajor($major);
    }
}