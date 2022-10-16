<?php
namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;

class StudentDao implements StudentDaoInterface
{
    public function getStudentList()
    {
        $student = Student::all();
        return $student;
    }
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
    public function updateStudent($validated, $id)
    {
        $student = Student::find($id);
        if($student){
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
    public function deleteStudent($student)
    {
        $student->delete();
        return $student;
    }
}