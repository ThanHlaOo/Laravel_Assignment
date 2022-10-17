<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;

class StudentDao implements StudentDaoInterface
{
    /**
     * Get Student List
     *
     * @return Object Student object
     */
    public function getStudentList()
    {
        $student = Student::all();
        return $student;
    }
    /**
     * Add Student Record
     *
     * @param Request StudentRequest object
     * @return Object Student object
     */
    public function addStudent($validated)
    {
        $student = new Student();
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->address = $validated['address'];
        $student->phone = $validated['phone'];
        $student->gender = $validated['gender'];
        $student->major_id = $validated['major_id'];
        $student->save();
        return $student;
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
        $student = Student::find($id);
        if ($student) {
            $student->email = $validated['email'];
            $student->name = $validated['name'];
            $student->address = $validated['address'];
            $student->phone = $validated['phone'];
            $student->gender = $validated['gender'];
            $student->major_id = $validated['major_id'];
            $student->update();
            return $student;
        }
        return false;
    }
    /**
     * Delete Student Record
     *
     * @param Object Student object
     * @return Object Student object
     */
    public function deleteStudent($student)
    {
        $student->delete();
        return $student;
    }
}
