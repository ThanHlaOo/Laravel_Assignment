<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Major;
use App\Models\Student;


class StudentController extends Controller
{
    private $studentInterface;
    public function __construct(StudentServiceInterface $studentInterface)
    {
        $this->studentInterface = $studentInterface;
    }
    public function index(){
        $student = $this->studentInterface->getStudentList();
        return view('index', ['students' => $student] );
    }
    public function showList()
    {
        $student = $this->studentInterface->getStudentList();
        return view('students.index', ['students' => $student] );
        
    }

    public function create(){
        $major = Major::all();
        return view('students.create', ['majors' => $major]);
    }
    public function addStudent(StudentRequest $request)
    {
        
        $validate = $request->validated();
        $student = $this->studentInterface->addStudent($validate);
        if($student){
            $student = $this->studentInterface->getStudentList();
            //return view('students.index', ['students' => $student] );
            return redirect()->route('student.list', ['students' => $student]);
        }

        return redirect()->back()->with('erorr', 'Insert Error');

    }
    public function edit(Student $student)
    {
        $major = Major::all();
        return view('students.edit', ['student' => $student, 'majors' => $major]);
    }
    public function update(StudentRequest $request, $id)
    {
        $validate = $request->validated();
        $student = $this->studentInterface->updateStudent($validate, $id);
        if($student){
           
            return redirect()->route('student.list')->with('success', 'Updated Successfully');
            
        }
        return redirect()->route('student.list')->with('error', 'Could not update');


    }
    public function delete(Student $student)
    {
        $student = $this->studentInterface->deleteStudent($student);
        if($student){
            return redirect()->route('student.list')->with('success', 'Deleted Successfully');
        }
        return redirect()->route('student.list')->with('error', 'Could not delete');
    }
}
