<?php 
namespace App\Contracts\Dao\Student;

interface StudentDaoInterface
{
    public function getStudentList();
    public function addStudent($validated);
    public function updateStudent($validated, $id);
    public function deleteStudent($student);
}
