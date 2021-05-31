<?php

namespace App\Model\Gym;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\City;

class Gym extends Model
{
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
