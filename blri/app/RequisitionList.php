<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionList extends Model
{
      public function productInfo()
    {
        return $this->belongsTo('App\ProductInfo');
    }
     public function employeeinfo(){//Get assigned employee information
        return $this->belongsTo('App\EmployeeInformation','employee_information_id');
    }
}
