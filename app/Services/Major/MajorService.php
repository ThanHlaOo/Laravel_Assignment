<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;

//MajorService Class
class MajorService implements MajorServiceInterface
{
    private $majorDao;
    /**
     * MajorService Constructor
     *
     * @param MajorDaoInterface $majorDao
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }
    /**
     * Get Major Record List
     *
     * @return Object Major object
     */
    public function getMajorList()
    {
        return $this->majorDao->getMajorList();
    }
    /**
     * Save Major Record
     *
     * @param Request MajorRequest Object
     * @return Object Major object
     */
    public function saveMajor($validated)
    {
        return $this->majorDao->saveMajor($validated);
    }
    /**
     * Update Major Record
     *
     * @param Request MajorRequest Object
     * @param integer $id
     * @return Object Major object
     */
    public function updateMajor($validated, $id)
    {
        return $this->majorDao->updateMajor($validated, $id);
    }
    /**
     * Delete Major Record
     *
     * @param Object Major object
     * @return Object Major object
     */
    public function deleteMajor($major)
    {
        return $this->majorDao->deleteMajor($major);
    }
}
