<?php

namespace App\Model\Country;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public  function  country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public  function  capital()
    {
        return $this->belongsTo(Capital::class,'capital_id');
    }
}
