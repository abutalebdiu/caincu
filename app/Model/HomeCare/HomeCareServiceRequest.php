<?php

namespace App\Model\HomeCare;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\City;
use App\User;

class HomeCareServiceRequest extends Model
{
    public  function  category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

 	public  function  service()
 	{
        return $this->belongsTo(Service::class,'service_id');
    }

     public  function  city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public  function  user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
