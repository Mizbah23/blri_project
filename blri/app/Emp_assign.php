<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_assign extends Model
{
     public function project(){
        return $this->belongsTo('App\project');
    }
     public function employeeinfo(){
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');//This employee has one project
    }
}
