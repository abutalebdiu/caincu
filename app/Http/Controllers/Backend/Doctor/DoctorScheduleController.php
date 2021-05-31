<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use App\Model\Doctor\Doctor;
use App\Model\Doctor\DoctorSchedule;
use App\Model\Organization\OrganizationBranch;
use Illuminate\Http\Request;
use App\Model\Doctor\Specialty;


class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctorschedules'] = DoctorSchedule::latest()->get();
        return view('backend.doctor.doctorschedule.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['doctors']=Doctor::get();
        $data['org_branchs']=OrganizationBranch::get();
        return view('backend.doctor.doctorschedule.create',$data);
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
            'start_time' => 'required',
            'end_time' => 'required',
            'doctor_id' => 'required',
            'organization_branch_id' => 'required',
            'day' => 'required',
        ]);

        $data = new DoctorSchedule();
        $data->doctor_id                = $request->doctor_id;
        $data->organization_branch_id   = $request->organization_branch_id;
        $data->start_time               = $request->start_time ;
        $data->end_time                 = $request->end_time;
        $data->day                      = $request->day;
        $data->note                     = $request->note;
        $data->status                   = 1;
        $data->is_active                = 1;
        $data->save();

        $notification = array(
            'message' => 'Doctor Schedule Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor_schedule.index')->with($notification);
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
        $data['doctorschedule'] = DoctorSchedule::find($id);
        $data['doctors']        = Doctor::get();
        $data['org_branchs']    = OrganizationBranch::get();

        return view('backend.doctor.doctorschedule.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'doctor_id' => 'required',
            'organization_branch_id' => 'required',
            'day' => 'required',
        ]);

        $data =  DoctorSchedule::find($id);
        $data->doctor_id                = $request->doctor_id;
        $data->organization_branch_id   = $request->organization_branch_id;
        $data->start_time               = $request->start_time ;
        $data->end_time                 = $request->end_time;
        $data->day                      = $request->day;
       
      
        $data->save();

        $notification = array(
            'message' => 'Doctor Schedule Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor_schedule.index')->with($notification);

    
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

        return redirect()->route('doctor_schedule.index')->with($notification);
    }
}
