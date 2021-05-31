<?php

namespace App\Model\Doctor;

use Illuminate\Database\Eloquent\Model;
use App\Model\Organization\OrganizationBranch;

class DoctorSchedule extends Model
{
    
	public  function  organizationBranch()
    {
        return $this->belongsTo(OrganizationBranch::class,'organization_branch_id');
    }
    public  function  doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public  function  user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
 

}
