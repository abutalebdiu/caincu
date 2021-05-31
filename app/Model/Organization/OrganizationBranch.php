<?php

namespace App\Model\Organization;

use App\Model\Country\City;
use Illuminate\Database\Eloquent\Model;

class OrganizationBranch extends Model
{
    public  function org()
    {
        return $this->belongsTo(Organization::class,'organization_id');
    }
    public  function  orgtype()
    {
        return $this->belongsTo(OrganizationType::class,'organization_type_id');
    }
    public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

//    protected $table = "organization_branches";


}
