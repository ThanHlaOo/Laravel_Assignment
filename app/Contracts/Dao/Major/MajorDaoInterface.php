<?php

namespace App\Contracts\Dao\Major;

interface MajorDaoInterface
{
    /**
     * Get Major Record List
     *
     * @return Object Major object
     */
    public function getMajorList();
    /**
     * Save Major Record
     *
     * @param Request MajorRequest Object
     * @return Object Major object
     */
    public function saveMajor($validated);
    /**
     * Update Major Record
     *
     * @param Request MajorRequest Object
     * @param integer $id
     * @return Object Major object
     */
    public function updateMajor($validated, $id);
    /**
     * Delete Major Record
     *
     * @param Object Major object
     * @return Object Major object
     */
    public function deleteMajor($major);
}
