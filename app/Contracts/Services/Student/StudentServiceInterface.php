<?php

namespace App\Contracts\Services\Student;

interface StudentServiceInterface
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
     * Search Student Data
     *
     * @param string  $key to Search
     * @return Object Student object
     */
    public function search($validated);
    /**
     * Delete Student Record
     *
     * @param Object Student object
     * @return Object Student object
     */
    public function deleteStudent($student);
    /**
     * Export Student Record
     *
     * @return Object Excel object
     */
    public function export();
    /**
     * Import Student Record
     *
     * @return Object Excel object
     */
    public function import();
}
    