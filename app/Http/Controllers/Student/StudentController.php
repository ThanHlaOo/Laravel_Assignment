<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Support\Facades\Request;

/**
 * Student Controller
 */
class StudentController extends Controller
{
    private $studentInterface;
    private $majorInterface;
    /**
     * Student Constructor
     *
     * @param Object Student Service Interface
     */

    public function __construct(StudentServiceInterface $studentInterface, MajorServiceInterface $majorInterface)
    {
        $this->studentInterface = $studentInterface;
        $this->majorInterface = $majorInterface;
    }
    /**
     * Show Admin Panel
     *
     * @return view Student Index Blade
     */
    public function index()
    {
        $student = $this->studentInterface->getStudentList();
        return view('index', ['students' => $student]);
    }
    /**
     * Show Student Data
     *
     * @return view Student Index Blade
     */
    public function showList()
    {
        $student = $this->studentInterface->getStudentList();
        return view('students.index', ['students' => $student]);
    }
    /**
     * Show Create Form 
     *
     * @return view Student Create Form Blade
     */
    public function create()
    {
        $major = $this->majorInterface->getMajorList();
        return view('students.create', ['majors' => $major]);
    }
    /**
     * ADD Student Record
     *
     * @param StudentRequest $request
     * @return view Student Index Blade Status Message
     */
    public function addStudent(StudentRequest $request)
    {

        $validate = $request->validated();
        $student = $this->studentInterface->addStudent($validate);
        if ($student) {
            $student = $this->studentInterface->getStudentList();
            //return view('students.index', ['students' => $student] );
            return redirect()->route('student.list', ['students' => $student]);
        }

        return redirect()->back()->with('erorr', 'Insert Error');
    }
    public function searchStudent()
    {
        $student = $this->studentInterface->search(request());
        //return $student;
        return view('index', ['students' => $student]);
    }
    /**
     * Show Edit Form
     *
     * @param Student $student
     * @return view Student Edit Blade Student Object Major Object
     */
    public function edit(Student $student)
    {
        $major = $this->majorInterface->getMajorList();
        return view('students.edit', ['student' => $student, 'majors' => $major]);
    }
    /**
     * Update Student Record
     *
     * @param StudentRequest $request
     * @param integer Student ID
     * @return view Student Index Blade Status Message
     */
    public function update(StudentRequest $request, $id)
    {
        $validate = $request->validated();
        $student = $this->studentInterface->updateStudent($validate, $id);
        if ($student) {

            return redirect()->route('student.list')->with('success', 'Updated Successfully');
        }
        return redirect()->route('student.list')->with('error', 'Could not update');
    }
    /**
     * Delete Student Record
     *
     * @param Student $student
     * @return view Student Index Blade Status Message
     */
    public function delete(Student $student)
    {
        $student = $this->studentInterface->deleteStudent($student);
        if ($student) {
            return redirect()->route('student.list')->with('success', 'Deleted Successfully');
        }
        return redirect()->route('student.list')->with('error', 'Could not delete');
    }
    /**
     * Export Student Data
     *
     * @return Object Excel object
     */
    public function export()
    {
        return $this->studentInterface->export();
    }
    /**
     * Import Student Data
     *
     * @return view Student Index Blade Status Message
     */
    public function import()
    {


        $this->studentInterface->import();
        return redirect()->route('student.list')->with('message', 'The Choosen File is sucessfully uploaded!');
    }
}
