<?php

namespace App\Model\Doctor;

use App\Model\Country\Capital;
use App\Model\Country\City;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public  function  specialty()
    {
        return $this->belongsTo(Specialty::class,'specialty_id');
    }
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public  function  capital()
    {
        return $this->belongsTo(Capital::class,'capital_id');
    }

}
