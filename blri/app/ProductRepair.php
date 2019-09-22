<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRepair extends Model
{
    //
       public function serialInfo()
    {
        return $this->belongsTo('App\SerialInfo','serial_id');
    }
      public function repairer()
    {
        return $this->belongsTo('App\Repairer');
    }
}
