<?php

namespace App\Model\BeautyCenter;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\City;

class BeautyCenter extends Model
{
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
