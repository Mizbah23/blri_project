<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
     public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
