<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface
{
    private $studentDao;
    /**
     * StudentService Constructor
     *
     * @param StudentDaoInterface $studentDao
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }
    /**
     * Get Student List
     *
     * @return Object Student object
     */
    public function getStudentList()
    {
        return $this->studentDao->getStudentList();
    }
    /**
     * Add Student Record
     *
     * @param Request StudentRequest object
     * @return Object Student object
     */
    public function addStudent($validated)
    {
        return $this->studentDao->addStudent($validated);
    }
    /**
     * Update Student Record
     *
     * @param Request StudentRequest object
     * @param integer Student Id
     * @return Object Student object
     */
    public function updateStudent($validated, $id)
    {
        return $this->studentDao->updateStudent($validated, $id);
    }
    /**
     * Delete Student Record
     *
     * @param Object Student object
     * @return Object Student object
     */
    public function deleteStudent($student)
    {
        return $this->studentDao->deleteStudent($student);
    }
    /**
     * Export Student Record
     *
     * @return Object Excel object
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    /**
     * Import Student Record
     *
     * @return Object Excel object
     */
    public function import()
    {
        return Excel::import(new StudentsImport, request()->file('studentImport'));
    }
}
