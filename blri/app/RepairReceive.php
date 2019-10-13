<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairReceive extends Model
{
        public function serialInfo()
    {
        return $this->belongsTo('App\SerialInfo','serial_id');
    }
      public function repairer()
    {
        return $this->belongsTo('App\Repairer');
    }
}
