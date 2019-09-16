<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerialInfo extends Model
{
    public function productInfo()
    {
        return $this->belongsTo('App\ProductInfo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
