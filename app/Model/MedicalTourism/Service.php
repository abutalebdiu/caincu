<?php

namespace App\Model\MedicalTourism;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "medical_tourism_services";

    public  function  medicalcat()
    {
        return $this->belongsTo(Category::class,'category_id');
    }




}
