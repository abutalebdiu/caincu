<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Model\TeleMedicine\TeleMedicineService;
use App\Model\DoctorAppointment;
use App\Model\MedicalTourism\TourismServiceRequest;
use App\Model\HomeCare\HomeCareServiceRequest;

use App\Model\Order\SaleInvoice;
class CustomerController extends Controller
{
    public function dashboard($local)
    {
    	$data['sales'] = SaleInvoice::where('customer_id',Auth::user()->id)
                                    ->whereNull('deleted_at')
                                    ->get(); 
    	$data['user'] = User::where('id',Auth::user()->id)->first();

    	return view('frontend.clients.dashboard',$data);
    }





    public function telemedicinerequest()
    {
    	$data['teleMedicineServices'] = TeleMedicineService::latest()->where('user_id',Auth::user()->id)->get();
    	return view('frontend.clients.telemedicinerequest',$data);
    }    



    public function medicinetourism()
    {
        $data['medicinetourismes'] = TourismServiceRequest::latest()->where('user_id',Auth::user()->id)->get();
        return view('frontend.clients.tourismservicerequest',$data);
    }


    public function homecareservice()
    {
        $data['homecareservices'] = HomeCareServiceRequest::latest()->where('user_id',Auth::user()->id)->get();

        return view('frontend.clients.homecareservicerequest',$data);
    }




    public function appointmentlist()
    {
        $data['appointmentlists'] = DoctorAppointment::latest()->where('user_id',Auth::user()->id)->get();
        return view('frontend.clients.appointmentlist',$data);
    }



 


 	public function logout($local,Request $request) {
        Auth::logout();
        return redirect('/');
    }



}
