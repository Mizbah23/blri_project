<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionList extends Model
{
        public function productInfo()
    {
        return $this->belongsTo('App\ProductInfo');
    }
        public function serialInfo()
    {
        return $this->belongsTo('App\SerialInfo','serial_id');
    }
      public function division()
    {
        return $this->belongsTo('App\division');
    }
}
