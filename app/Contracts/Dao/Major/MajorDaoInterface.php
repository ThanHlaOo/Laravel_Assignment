<?php 
namespace App\Contracts\Dao\Major;

interface MajorDaoInterface 
{
    public function getMajorList();
    public function saveMajor($validated);
    public function updateMajor($validated, $id);
    public function deleteMajor($major);
}
