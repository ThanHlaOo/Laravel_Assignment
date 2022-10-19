<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentDao implements StudentDaoInterface
{
    /**
     * Get Student List
     *
     * @return Object Student object
     */
    public function getStudentList()
    {
        $student = Student::paginate(10);
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
            $student->save();
            return $student;
        }
        return false;
    }
    /**
     * Search Student Data
     *
     * @param string $key to Search
     * @return Object Student object
     */
    public function search($validated)
    {
        $key = $validated['key'];
        $startDate = $validated['startDate'];
        $endDate =  $validated['endDate'];
        $query = DB::table('students')
            ->selectRaw('students.* , majors.name as major_name')
            ->leftJoin('majors', 'majors.id', '=', 'students.major_id');
        if ($startDate && $endDate) {
            $query = $query->orWhereRaw("students.created_at >= '" . $startDate . "' AND students.created_at <= '" . $endDate . "'")
                ->orWhereRaw("students.updated_at >= '" . $startDate . "' AND students.updated_at <= '" . $endDate . "'");
        } else {
            $query = $query->orWhereRaw("students.name LIKE '%$key%'")
                ->orWhereRaw("students.phone LIKE '%$key%'")
                ->orWhereRaw("students.address LIKE '%$key%'")
                ->orwhereRaw("majors.name LIKE '%$key%'")
                ->orwhereRaw("students.gender LIKE '%$key%'");
        }

        $student = $query->paginate(10);
        $student->appends(request()->all());
        return $student;
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
