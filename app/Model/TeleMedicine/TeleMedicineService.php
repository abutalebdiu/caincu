<?php

namespace App\Model\TeleMedicine;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\City;
use App\User;

class TeleMedicineService extends Model
{
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public  function  user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
