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
    public function district(){
        return $this->belongsTo('App\District');// This employee belongs to this district
    }
        public function project()
    {
        return $this->hasOne('App\Project');
    }
     public function user(){
        return $this->hasOne('App\User');// This employee has one User
    }

}
