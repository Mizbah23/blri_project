<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblPurchase extends Model
{
      public function supplierInfo()
    {
        return $this->belongsTo('App\Supplier','supplier_id');
    }
}
