<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Requests\StudentRequest;

class ApiController extends Controller
{
    /**
     * student interface property
     */
    private $studentInterface;

    /**
     * major interface property
     */
    private $majorInterface;

    /**
     * Class Contructor
     * @param StudentServiceInterface $studentServiceInterface,
     * @param MajorServiceInterface $majorInerface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface, MajorServiceInterface $majorInterface)
    {
        $this->studentInterface = $studentServiceInterface;
        $this->majorInterface = $majorInterface;
    }

    /**
     * Show Index Page
     * @return View Index Blade
     */
    public function showList()
    {
        return view('ajax.students.index');
    }

    /**
     * Show Create Form Page
     * @return View Create Form Blade
     */

    public function showCreate()
    {
        return view('ajax.students.create');
    }

    /**
     * Show Edit Form Page
     * @return View Edit Form Blade
     */
    public function showEdit()
    {
        return view('ajax.students.edit');
    }

    /**
     * show selected id data
     */
    public function getStudentById($id)
    {
        $student = $this->studentInterface->getStudentById($id);
        return $student;
    }

    /**
     * Get Student List 
     * @return Object Student object
     */
    public function getStudentList()
    {

        return $this->studentInterface->getStudentListByAPI();
    }

    /**
     * Get Major List
     * @return Object Major object
     */
    public function getMajorList()
    {
        return $this->majorInterface->getMajorList();
    }
    public function addStudent(StudentRequest $request)
    {
        $validate = $request->validated();
        $this->studentInterface->addStudent($validate);
    }
    /**
     * Update Any Resource 
     *
     * @param  Request $request
     * @param  integer  $id
     * @return Object Student object
     */
    public function updateStudent(StudentRequest $request, $id)
    {
        $validate = $request->validated();
        $this->studentInterface->updateStudent($validate, $id);
    }
    /**
     * Delete Student Record
     *
     * @param  integer  $id
     * @return Object student object
     */
    public function destroyStudent($id)
    {
        return $this->studentInterface->deleteStudentByAPI($id);
    }
}
