<?php

namespace App\Model\HomeCare;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public  function  homecatt()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


 	 


    protected $table = "home_care_services";
}
