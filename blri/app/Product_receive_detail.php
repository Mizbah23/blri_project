<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_receive_detail extends Model
{
    public function productReceiveSave()
    {
        return $this->belongsTo('App\productReceiveSave','product_receive_id');
    }
}
