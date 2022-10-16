<?php

namespace App\Http\Controllers\Major;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Models\Major;


class MajorController extends Controller
{
    private $majorInterface;
    public function __construct(MajorServiceInterface $majorInterface)
    {
        $this->majorInterface = $majorInterface;
    }
    public function index()
    {
        $major = $this->majorInterface->getMajorList();
        return view('majors.index', ['majors' => $major] );
        
    }

    public function create(){
        return view('majors.create');
    }
    public function addMajor(MajorRequest $request)
    {
        $validate = $request->validated();
        $major = $this->majorInterface->saveMajor($validate);
        if($major){
            $major = $this->majorInterface->getMajorList();
            //return view('majors.index', ['majors' => $major] );
            return redirect()->route('major.home', ['majors' => $major]);
        }
        return view('majors.create');

    }
    public function edit($id)
    {
        $major = Major::find($id);
        return view('majors.edit', ['major' => $major]);
    }
    public function update(MajorRequest $request, $id)
    {
        $validate = $request->validated();
        $major = $this->majorInterface->updateMajor($validate, $id);
        if($major){
           
            return redirect()->route('major.list')->with('success', 'Updated Successfully');
            
        }
        return redirect()->route('major.list')->with('error', 'Could not update');


    }
    public function delete(Major $major)
    {
        $major = $this->majorInterface->deleteMajor($major);
        if($major){
            return redirect()->route('major.list')->with('success', 'Deleted Successfully');
        }
        return redirect()->route('major.list')->with('error', 'Could not delete');
    }

}
