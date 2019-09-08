<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReceiveList extends Model
{
    public function supplierInfo()
    {
        return $this->belongsTo('App\Supplier','supplier_id');
    }
    public function productInfo()
    {
        return $this->belongsTo('App\ProductInfo');
    }
}
