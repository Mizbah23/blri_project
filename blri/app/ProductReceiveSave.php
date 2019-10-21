<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReceiveSave extends Model
{
        public function productReceiveMaster()
    {
        return $this->belongsTo('App\productReceiveMaster','product_receive_master_id');
    }
}
