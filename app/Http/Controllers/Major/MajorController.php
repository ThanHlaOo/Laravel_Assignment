<?php

namespace App\Http\Controllers\Major;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Models\Major;

//Major Controller
class MajorController extends Controller
{
    private $majorInterface;
    /**
     * Major Controller
     *
     * @param MajorServiceInterface $majorInterface
     */
    public function __construct(MajorServiceInterface $majorInterface)
    {
        $this->majorInterface = $majorInterface;
    }
    /**
     * Show Major Data
     *
     * @return view Major Index Blade
     */
    public function index()
    {
        $major = $this->majorInterface->getMajorList();
        return view('majors.index', ['majors' => $major]);
    }
    /**
     * Show Create Form 
     *
     * @return view Major Create Form Blade
     */
    public function create()
    {
        return view('majors.create');
    }
    /**
     * ADD Major Record
     *
     * @param MajorRequest $request
     * @return view Major Index Blade Major Object
     */
    public function addMajor(MajorRequest $request)
    {
        $validate = $request->validated();
        $major = $this->majorInterface->saveMajor($validate);
        if ($major) {
            $major = $this->majorInterface->getMajorList();
            //return view('majors.index', ['majors' => $major] );
            return redirect()->route('major.list', ['majors' => $major]);
        }
        return view('majors.create');
    }
    /**
     * Show Edit Form
     *
     * @param integer Major Id
     * @return view Major Edit Blade Major Object
     */
    public function edit($id)
    {
        $major = Major::find($id);
        return view('majors.edit', ['major' => $major]);
    }
    /**
     * Update Major Record
     *
     * @param MajorRequest $request
     * @param integer Major ID
     * @return view Major Index Blade Status Message
     */
    public function update(MajorRequest $request, $id)
    {
        $validate = $request->validated();
        $major = $this->majorInterface->updateMajor($validate, $id);
        if ($major) {

            return redirect()->route('major.list')->with('success', 'Updated Successfully');
        }
        return redirect()->route('major.list')->with('error', 'Could not update');
    }
    /**
     * Delete Major Record
     *
     * @param Major $major
     * @return view Major Index Blade Status Message
     */
    public function delete(Major $major)
    {
        $major = $this->majorInterface->deleteMajor($major);
        if ($major) {
            return redirect()->route('major.list')->with('success', 'Deleted Successfully');
        }
        return redirect()->route('major.list')->with('error', 'Could not delete');
    }
}
