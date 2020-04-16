<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function party()
    {
    	return $this->belongsTo('App\Party');
    }
}
