<?php

namespace App\Model\Country;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    public  function  country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
