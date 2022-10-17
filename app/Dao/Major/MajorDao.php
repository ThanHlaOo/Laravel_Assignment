<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface
{
    /**
     * Get Major Record List
     *
     * @return Object Major object
     */
    public function getMajorList()
    {
        $major = Major::all();
        return $major;
    }
    /**
     * Save Major Record
     *
     * @param Request MajorRequest Object
     * @return Object Major object
     */
    public function saveMajor($validated)
    {
        $major = new Major();
        $major->name = $validated['name'];
        $major->code = $validated['code'];
        $major->save();
        return $major;
    }
    /**
     * Delete Major Record
     *
     * @param Object Major object
     * @return Object Major object
     */
    public function deleteMajor($major)
    {
        $major->delete();
        return $major;
    }
    /**
     * Update Major Record
     *
     * @param Request MajorRequest Object
     * @param integer $id
     * @return Object Major object
     */
    public function updateMajor($validated, $id)
    {
        $major = Major::find($id);
        if ($major) {
            $major->name = $validated['name'];
            $major->code = $validated['code'];
            $major->update();
            return $major;
        }
        return false;
    }
}
