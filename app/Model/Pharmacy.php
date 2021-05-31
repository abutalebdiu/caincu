<?php

namespace App\Model;

use App\Model\Country\Capital;
use App\Model\Country\City;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public  function  capital()
    {
        return $this->belongsTo(Capital::class,'capital_id');
    }
}
