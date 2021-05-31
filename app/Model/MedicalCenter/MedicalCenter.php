<?php

namespace App\Model\MedicalCenter;

use Illuminate\Database\Eloquent\Model;
use App\Model\Doctor\Specialty;

class MedicalCenter extends Model
{
    public  function  specialty()
    {
        return $this->belongsTo(Specialty::class,'specialty_id');
    }
}
