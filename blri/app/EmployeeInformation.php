<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    public function section(){
        return $this->belongsTo('App\Section');//This employee has one section
    }

    public function designation(){
        return $this->belongsTo('App\Designation');// This employee has one designation
    }
}
