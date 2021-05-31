<?php

namespace App\Model\MedicalTourism;

use App\Model\Country\Country;
use Illuminate\Database\Eloquent\Model;
use App\User;

class TourismServiceRequest extends Model
{
   public  function  category()
    {
        return $this->belongsTo(Category::class,'category_id');
    } 


    public  function  country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public  function  user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
