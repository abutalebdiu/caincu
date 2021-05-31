<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;
use App\Model\Country\City;
use App\Model\Doctor\Doctor;
use App\Model\Doctor\Specialty;
use App\Model\Doctor\DoctorSchedule;

class DoctorOrganizationBranch extends Model
{
	

	public  function  doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public  function  specialty()
    {
        return $this->belongsTo(Specialty::class,'specialty_id');
    }

    public  function org()
    {
        return $this->belongsTo(Organization::class,'organization_id');
    }

    public  function  organizationBranch()
    {
        return $this->belongsTo(OrganizationBranch::class,'organization_branch_id');
    }

    public  function  city()
    {
        return $this->belongsTo(City::class,'organization_city_id');
    }

  
    public  function  doctorSchedule()
    {
        return $this->belongsTo(DoctorSchedule::class,'doctor_schedule_id');
    }

    public  function  org_type()
    {
        return $this->belongsTo(OrganizationType::class,'organization_type_id');
    }

    
   

	




}
