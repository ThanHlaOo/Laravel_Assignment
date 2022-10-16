<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentService implements StudentServiceInterface
{
    private $studentDao;
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    public function getStudentList()
    {
        return $this->studentDao->getStudentList();
    }
    public function addStudent($validated)
    {
        return $this->studentDao->addStudent($validated);
    }
    public function updateStudent($validated, $id)
    {
        return $this->studentDao->updateStudent($validated, $id);
    }
    public function deleteStudent($student)
    {
        return $this->studentDao->deleteStudent($student);
    }
}