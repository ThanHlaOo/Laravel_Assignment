<?php
namespace App\Contracts\Services\Student;

interface StudentServiceInterface 
{
    public function getStudentList();
    public function addStudent($validated);
    public function updateStudent($validated, $id);
    public function deleteStudent($student);
}