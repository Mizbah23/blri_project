<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
     protected $table = 'department';

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}

