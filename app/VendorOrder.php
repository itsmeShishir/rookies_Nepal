<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorOrder extends Model
{
    public function orders(){
        return $this->hasOne('App\Order','id','order_id');
    }
    public function products(){
        return $this->hasMany('App\VendorOrderProduct','order_id');
    }
}
