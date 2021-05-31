<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use App\Model\Country\Capital;
use App\Model\Country\City;
use App\Model\Country\Country;
use App\Model\Doctor\Doctor;
use App\Model\Doctor\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctors'] = Doctor::get();
        return view('backend.doctor.doctors.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['specialtys'] = Specialty::latest()->get();
        $data['countrys']=Country::get();
        $data['capitals']=Capital::get();
        $data['cities'] = city::get();
        return view('backend.doctor.doctors.create',$data);
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
            'name' => 'required',
            'name_ar' => 'required',
            'specialty_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $data = new Doctor();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->specialty_id = $request->specialty_id;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->city_id = $request->city_id;
        $data->address = $request->address;

        $image = $request->image;

        if($image){
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'public/images/doctors/';
            $imagename = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $data->image  = $imagename;    
        }

        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Doctor Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')->with($notification);
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
        $data['doctor'] = Doctor::find($id);
        $data['specialtys'] = Specialty::get();
        $data['cities'] = City::get();
        return view('backend.doctor.doctors.edit',$data);
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
            'name' => 'required',
            'name_ar' => 'required',
            'specialty_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $data = Doctor::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->specialty_id = $request->specialty_id;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->city_id = $request->city_id;
        $data->address = $request->address;

        $image = $request->image;

        if($image){
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'public/images/doctors/';
            $imagename = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $data->image  = $imagename;    
        }
        
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Doctor Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =  Doctor::find($id)->delete();

        $notification = array(
            'message' => 'Doctor Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('doctor.index')->with($notification);
    }
}
