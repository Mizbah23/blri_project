<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     public function employeeinfo(){
        return $this->belongsTo('App\EmployeeInformation');//This employee has one project
    }

}
