<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    public function bills()
    {
    	return $this->hasMany('App\Bill');
    }

    public function vouchers()
    {
    	return $this->hasMany('App\TestingVoucher');
    }
}
