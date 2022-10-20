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
     * Get Student List By API
     *
     * @return Object Student object
     */
    public function getStudentListByAPI();
    /**
     * Get Student By ID
     *
     * @param integer $id
     * @return Object Student object
     */
    public function getStudentById($id);
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
     * Delete Student Record by API
     *
     * @param integer $id
     * @return object student object
     */
    public function deleteStudentByAPI($id);
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
    