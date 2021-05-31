<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HomeCare\HomeCareServiceRequest;
use App\Model\MedicalTourism\TourismServiceRequest;
use App\Model\TeleMedicine\TeleMedicineService;
use App\Model\DoctorAppointment;


class ServiceController extends Controller
{
    

    public function homecarerequest()
    {
    	$data['homecarerequestes'] = HomeCareServiceRequest::latest()->get();
    	return view('backend.requestservices.homecarerequest',$data);
    }

    public function telemedicine()
    {
    	$data['telemedicinerequestes'] = TeleMedicineService::latest()->get();
    	return view('backend.requestservices.telemedicine',$data);
    }


    public function appointment(){
    	
    	$data['appointmentrequestes'] = DoctorAppointment::latest()->get();
    	return view('backend.requestservices.appointment',$data);
    }




    public function medicialtourism()
    {
    	$data['medicialtourismrequestes'] = TourismServiceRequest::latest()->get();
    	return view('backend.requestservices.medicialtourism',$data);
    } 








}
