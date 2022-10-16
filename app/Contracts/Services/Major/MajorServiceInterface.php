<?php
namespace App\Contracts\Services\Major;

interface MajorServiceInterface 
{
    public function getMajorList();
    public function saveMajor($validated);
    public function updateMajor($validated, $id);
    public function deleteMajor($major);
}