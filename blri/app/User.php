<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function employeeinfo(){//Get assigned employee information
        return $this->belongsTo('App\EmployeeInformation','employee_information_id'); //This employee has one user
    }
}
