<?php

namespace App\Model\Organization;

use App\Model\Country\City;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public  function  org_type()
    {
        return $this->belongsTo(OrganizationType::class,'organization_type_id');
    }

    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
