<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     public function employeeinfo(){
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');//This employee has one project
    }

}
