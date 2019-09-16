<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReleaseInfo extends Model
{
    public function project(){//Get assigned project information
        return $this->belongsTo('App\project');// This assigned project belongs to this project
    }

    public function employeeInfo(){//Get assigned employee information
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');//This employee has one project
    }

    public function serialInfo(){
        return $this->belongsTo('App\SerialInfo','serial_info_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','receiveBy');
    }
    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}
