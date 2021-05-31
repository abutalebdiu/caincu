<?php

namespace App\Http\Controllers\Backend\Organization;

use App\Http\Controllers\Controller;
use App\Model\Organization\DoctorOrganizationBranch;
use Illuminate\Http\Request;
use App\Model\Doctor\Doctor;
use App\Model\Doctor\DoctorSchedule;
use App\Model\Organization\OrganizationBranch;
use App\Model\Organization\Organization;
use App\Model\Organization\OrganizationType;
use App\Model\Doctor\Specialty;
use App\Model\Country\City;

class DoctorOrganizationBranchController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['schedules'] = DoctorOrganizationBranch::latest()->get();
        return view('backend.organization.doctor_organization.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['org_types']      = OrganizationType::get();
        $data['doctors']        =Doctor::get();
        $data['specialtys']     =Specialty::latest()->get();
        $data['org_branchs']    =OrganizationBranch::get();
        $data['org']            =Organization::latest()->get();
        $data['doctorschedules']=DoctorSchedule::latest()->get();
        $data['cities']         =City::get();
 
        return view('backend.organization.doctor_organization.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          
            'specialty_id' => 'required',
            'doctor_id' => 'required',
            'organization_branch_id' => 'required',
            'organization_id' => 'required',
        ]);

        $data = new DoctorOrganizationBranch();

        $data->doctor_id                = $request->doctor_id;
        $data->specialty_id             = $request->specialty_id;
        $data->organization_id          = $request->organization_id;
        $data->organization_branch_id   = $request->organization_branch_id;
        $data->organization_city_id     = $request->organization_city_id;
        $data->doctor_schedule_id       = $request->doctor_schedule_id ;
        $data->organization_type_id     = $request->organization_type_id;
        $data->status                   = 1;
        $data->is_active                = 1;
        $data->save();

        $notification = array(
            'message' => 'Doctor Schedule Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('organization.doctor.schedule.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function show(Capital $capital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['org_types']      = OrganizationType::get();
        $data['doctors']        =Doctor::get();
        $data['specialtys']     =Specialty::latest()->get();
        $data['org_branchs']    =OrganizationBranch::get();
        $data['org']            =Organization::latest()->get();
        $data['doctorschedules']=DoctorSchedule::latest()->get();
        $data['cities']         =City::get();

        $data['schedule']       = DoctorOrganizationBranch::find($id);


        return view('backend.organization.doctor_organization.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'specialty_id' => 'required',
            'doctor_id' => 'required',
            'organization_branch_id' => 'required',
            'organization_id' => 'required',
        ]);

        $data =  DoctorOrganizationBranch::find($id);

        $data->doctor_id                = $request->doctor_id;
        $data->specialty_id             = $request->specialty_id;
        $data->organization_id          = $request->organization_id;
        $data->organization_branch_id   = $request->organization_branch_id;
        $data->organization_city_id     = $request->organization_city_id;
        $data->doctor_schedule_id       = $request->doctor_schedule_id ;
        $data->organization_type_id     = $request->organization_type_id;
        $data->status                   = 1;
        $data->is_active                = 1;
        $data->save();

        $notification = array(
            'message' => 'Doctor Schedule Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('organization.doctor.schedule.index')->with($notification);

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =  DoctorSchedule::find($id)->delete();

        $notification = array(
            'message' => 'Doctor Schedule Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('organization.doctor.schedule.index')->with($notification);
    }

}
