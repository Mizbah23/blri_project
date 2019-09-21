<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdjustmentInformationList extends Model
{
    public function productInfo()
    {
        return $this->belongsTo('App\ProductInfo');
    }
}
