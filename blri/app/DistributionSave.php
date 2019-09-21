<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionSave extends Model
{
    public function serialInfo()
    {
        return $this->belongsTo('App\SerialInfo','serial_id');
    }
    public function division()
    {
        return $this->belongsTo('App\division');
    }
}
