<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address', 'major_id', 'gender'];
    public function major(){
        return $this->belongsTo('App\Models\Major');
    }
}
