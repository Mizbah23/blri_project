<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     public function employeeinfo(){
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');//This employee has one project
    }
     public function employees(){
        return $this->hasMany('App\EmployeeInformation','employee_information_id');//This employee has one project
    }
    //  // one project can has many employee assigned
     public function assignedEmployees()
     {
         return $this->hasMany('App\Emp_assign','project_id');
     }

}
