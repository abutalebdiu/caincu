<?php

namespace App\Http\Controllers\Backend\Application;

use App\Http\Controllers\Controller;
use App\Model\Country\Capital;
use App\Model\Doctor\Doctor;
use App\Model\Hospital\Hospital;
use App\Model\Organization\Organization;
use App\Model\Gym\Gym;
use App\Model\BeautyCenter\BeautyCenter;
use App\Model\Pharmacy;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public  function hospital(){
        $data['hospitals'] = Hospital::get();
        return view('backend.applications.hospital',$data);
    }
    public  function hospitalshow($id){

        $data['hospital'] = Hospital::find($id);
        return view('backend.applications.hospital-show',$data);
    }

    public function doctor(){
        $data['doctors'] = Doctor::get();
        return view('backend.applications.doctor',$data);
    }
    public function doctorshow($id){
        $data['doctor'] = Doctor::find($id);
        return view('backend.applications.doctor-show',$data);
    }

    public function medicalcenter(){
        $data['medicals'] = Organization::get();
        return view('backend.applications.medical-center',$data);
    }
    public function medicalcentershow($id){
        $data['medical'] = Organization::find($id);
        return view('backend.applications.medical-center-show',$data);
    }

    public function pharmacy(){
        $data['pharmacy'] = Pharmacy::get();
        return view('backend.applications.pharmacy',$data);
    }
    public function pharmacyshow($id){
        $data['pharmacy'] = Pharmacy::find($id);
        return view('backend.applications.pharmacy-show',$data);

    }

    public function gym(){
        $data['gym'] = Gym::get();
        return view('backend.applications.gym',$data);
    }
    public function gymshow($id){
        $data['gym'] = Gym::find($id);
        return view('backend.applications.gym-show',$data);

    }

    public function beautycenter(){
        $data['beauty'] = BeautyCenter::get();
        return view('backend.applications.beauty-center',$data);
    }
    public function beautycentershow($id){
        $data['beauty'] = BeautyCenter::find($id);
        return view('backend.applications.beauty-center-show',$data);

    }








    public function pharmacychangeupdate(Request $request, $id){
        $data = Pharmacy::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.pharmacy')->with($notification);
    }
    public function medicalchangeupdate(Request $request, $id){
        $data = Organization::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.medical-center')->with($notification);
    }
    public function hospitalchangeupdate(Request $request, $id){
        $data = Hospital::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.hospital')->with($notification);
    }

    public function doctorchangeupdate(Request $request, $id){
        $data = Doctor::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.doctor')->with($notification);
    }

    public function gymchangeupdate(Request $request, $id){
        $data = Gym::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.gym')->with($notification);
    }

    public function beautycenterchangeupdate(Request $request, $id){
        $data = BeautyCenter::find($id);
        $data->is_verified = $request->is_verified;
        $data->save();
        $notification = array(
            'message' => 'verify update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('application.beauty.center')->with($notification);
    }
}
