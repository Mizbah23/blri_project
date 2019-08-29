<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_assign extends Model
{
     public function project(){//Get assigned project information
        return $this->belongsTo('App\project');// This assigned project belongs to this project
    }
    public function employeeinfo(){//Get assigned employee information
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');//This employee has one project
    }
   
}
