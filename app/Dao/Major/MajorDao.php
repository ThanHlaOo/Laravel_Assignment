<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface
{
    public function getMajorList()
    {
        $major = Major::all();
        return $major;
    }
    public function saveMajor($validated)
    {
        $major = new Major();
        $major->name = $validated['name'];
        $major->code = $validated['code'];
        $major->save();
        return $major;
    }
    public function deleteMajor($major)
    {
        $major->delete();
        return $major;
    }
    public function updateMajor($validated, $id)
    {
        $major = Major::find($id);
        if($major){
            $major->name = $validated['name'];
            $major->code = $validated['code'];
            $major->update();
            return $major;
        }
        return false;
    }
}