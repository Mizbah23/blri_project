<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function division()
   {
    return $this->belongsTo('App\division');
    }
}
