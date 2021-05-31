<?php

namespace App\Model\Hospital;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\Capital;
use App\Model\Country\City;
use App\Model\Doctor\Specialty;
class Hospital extends Model
{
    public function capital(){
       return $this->belongsTo(Capital::class,'capital_id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public  function  specialty()
    {
        return $this->belongsTo(Specialty::class,'specialty_id');
    }


}
