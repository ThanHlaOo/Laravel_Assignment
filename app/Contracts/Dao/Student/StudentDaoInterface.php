<?php 
namespace App\Contracts\Dao\Student;

interface StudentDaoInterface
{
    /**
     * Get Student List
     *
     * @return Object Student object
     */
    public function getStudentList();
    /**
     * Add Student Record
     *
     * @param Request StudentRequest object
     * @return Object Student object
     */
    public function addStudent($validated);
    /**
     * Update Student Record
     *
     * @param Request StudentRequest object
     * @param integer Student Id
     * @return Object Student object
     */
    public function updateStudent($validated, $id);
    /**
     * Delete Student Record
     *
     * @param Object Student object
     * @return Object Student object
     */
    public function deleteStudent($student);
}
