<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestingVoucher extends Model
{
    public function party()
    {
    	return $this->belongsTo('App\Party');
    }
}
