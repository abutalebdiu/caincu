<?php

namespace App\Http\Controllers;

use App\Model\Country\Capital;
use App\Model\Doctor\Doctor;
use App\Model\Hospital\Hospital;
use App\Model\Organization\Organization;
use App\Model\Pharmacy;
use App\Model\Gym\Gym;
use App\Model\BeautyCenter\BeautyCenter;
use App\Model\MedicalCenter\MedicalCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\SocialMedia;
use App\Model\DoctorAppointment;
use DB;
use App\Model\Product;
use App\Model\Country\City;
use App\Model\Country\Country;
use App\Model\Doctor\Specialty;
use App\Model\TeleMedicine\Type;
use App\Model\TeleMedicine\TeleMedicineService;
use App\Model\MedicalTourism\TourismServiceRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use App\User;
use Auth;
use App\Model\MedicalTourism\Category as MedicalTourismCategory;
use App\Model\MedicalTourism\Service as MedicalTourismService;
use App\Model\HomeCare\Service as HomeService;
use App\Model\HomeCare\Category as Homecategory;
use App\Model\HomeCare\HomeCareServiceRequest;

use App\Model\Organization\DoctorOrganizationBranch;
use App\Model\Brand;
use App\Model\Contract;

class FrontendController extends Controller
{


    public function adminlogin()
	{

		return view('auth.login');
	}



	public function customerLogindeshboard(Request $request)
	{
		$input = $request->all();

        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
	        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
	        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
	        {
	            
	            
	            if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3)
	            {
	                 return redirect()->route('home');
	            }
	            elseif(Auth::user()->role_id==4)
	            {
	                 return redirect()->route('doctor-dashboard');
	            }
	            
	            elseif(Auth::user()->role_id==5)
	            {
	                 return redirect()->route('medicalcenter-dashboard');
	            }
	            
	            elseif(Auth::user()->role_id==6)
	            {
	                 return redirect()->route('hospital-dashboard');
	            }
	            
	            elseif(Auth::user()->role_id==7)
	            {
	                 return redirect()->route('pharmacy-dashboard');
	            }
	            elseif(Auth::user()->role_id==8)
	            {
	                 return redirect()->route('gym-dashboard');
	            }
	            
	            elseif(Auth::user()->role_id==9)
	            {
	                 return redirect()->route('beautycare-dashboard');
	            }
	            else{
	                return redirect()->route('customer.dashboard'); 
	            }
	            
	            
	        }else{
	            return redirect()->route('customer.login')
	                ->with('error','Email-Address And Password Are Wrong.');
            }
    	}
	}








	public function index()
	{
		$data['cities'] = City::all();
		$data['typies'] = Type::all();
		$data['specilities'] = Specialty::all();

		$data['categories'] = Category::orderBy('id','ASC')
                            ->where('status',1)
                            ->where('child_id',0)
                            ->get();


  		return view('frontend.pages.index',$data);
	}

	public function about()
	{
		return view('frontend.pages.about');
	}




	public function onlinepharmacy(Request $request)
	{
        //session(['saleCart' => []]);
        $makeRoute = '';
        $page           = $request->page;
        $brand_id       = $request->brand_id;
        $start_amount   = $request->start_amount;
        $end_amount     = $request->end_amount;
        $category_id    = $request->category_id;

        $product_id    = $request->product_id;

        if($page)
        {
            $page = 'page='.$page;

        }else{
            $page = 'page=1';
        }
        $makeRoute .= $page;

        if($brand_id)
        {
            $brand_id = $brand_id;
        }else{
            $brand_id = '';
        }
        $makeRoute .= '&brand_id='.$brand_id;

        if($start_amount)
        {
            $start_amount = $start_amount;
        }else{
            $start_amount = 1;
        }
        $makeRoute .= '&start_amount='.$start_amount;

        if($end_amount)
        {
            $end_amount = $end_amount;
        }else{
            $end_amount = 1;
        }
        $makeRoute .= '&end_amount='.$end_amount;

        if($category_id)
        {
            $sControl = "&category_id=";
            $pControl = "[0-9]{1,2}[a-z]{2}"; //1 or 2 numbers followed by 2 lowercase letters
            $sResult = preg_replace("' ".$sControl.".*'s", '', $makeRoute);
            //$sResult .= '&category_id='.$category_id;
            $makeRoute = $sResult;
            //$makeRoute .= '&category_id='.$category_id;
        }else{
            $makeRoute .= '&category_id=';
        }

        $data['makeRoute']      = $makeRoute;
        $data['page']           = $page;
        $data['brand_id']       = $brand_id;
        $data['start_amount']   = $start_amount;
        $data['end_amount']     = $end_amount;
        $data['category_id']    = $category_id;

        $category_id    = $request->category_id;
        $brand_id       = $request->brand_id;
        $start_amount   = $request->start_amount;
        $end_amount     = $request->end_amount;
        if(!$end_amount)
        {
            $end_amount = 50000;
        }
        $query   = Product::query();
                    $query->when($category_id,function($q) use ($category_id){
                        return $q->where('category_id',$category_id);
                    });
                    $query->when($start_amount,function($q) use ($start_amount,$end_amount){
                        return $q->where('price', '>=', $start_amount)
                        ->where('price', '<=', $end_amount);
                    });
                    $query->when($brand_id,function($q) use ($brand_id){
                        return $q->whereIn('brand_id',[$brand_id]);
                    });
                    $query->when($product_id,function($q) use ($product_id){
                        return $q->where('title','like','%'.$product_id.'%')
                        ->orWhere('ar_title','like','%'.$product_id.'%');
                    });
        $data['products'] = $query->latest()->where('status',1)->paginate(40);

        $data['categories'] = Category::orderBy('id','ASC')
                            ->where('status',1)
                            ->where('child_id',0)
                            ->get();
        $data['brands']     = Brand::latest()->get();
		return view('frontend.pages.onlinepharmacy',$data);
	}

    /**Add To Sale Cart */
	public function addToCart(Request $request)
	{
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        $cartName = [];
        $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];

        if($product)
        {
            if(array_key_exists($product->id,$cartName))
            {
                $cartName[$product->id]['quantity'] = $cartName[$product->id]['quantity'] + 1;
                //$cartName[$product->id]['price']    = ($cartName[$product->id]['quantity']+1) * $cartName[$product->id]['price'];
            }
            else{
                $cartName[$product->id] = [
                    'product_id'        => $product->id,
                    'default_image'     => $product->default_image,
                    'product_title'     => $product->title,
                    'product_title_ar'  => $product->ar_title,
                    'category_id'       => $product->category_id,
                    'quantity'          => 1,
                    'brand_id'          => $product->brand_id,
                    'unit_id'           => $product->unit_id,
                    'unit_name'         => $product->unit ? $product->unit->name : '',
                    'unit_name_ar'      => $product->unit ? $product->unit->ar_name : '',
                    'price'             => $product->price,
                ];
            }
            session(['saleCart' => $cartName]);
        }
        $html = view('frontend.pages.saleCartDetailsByAjax')->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
	}
    /**Add To Sale Cart */

    /**if sale cart exist */
	public function existSaleCart(Request $request)
	{
        $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];
        $html = view('frontend.pages.saleCartDetailsByAjax')->render();
        if(count($cartName) > 0)
        {
            return response()->json([
                'status' => true,
                'success' => true,
                'data' => $html
                ]);
            }
        $html = view('frontend.pages.emptySaleCartByAjax')->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
	}
    /**if sale cart exist */

    /**remove single item from sale cart */
	public function removeSingleItemFromSaleCart(Request $request)
	{
        $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];
        unset($cartName[$request->input('product_id')]);
        session(['saleCart'=>$cartName]);
        $html = view('frontend.pages.saleCartDetailsByAjax')->render();
        if(count($cartName) > 0)
        {
            return response()->json([
                'status' => true,
                'success' => true,
                'data' => $html
                ]);
            }
        $html = view('frontend.pages.emptySaleCartByAjax')->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
	}
    /**remove single item from sale cart */

    /**remove All item from sale cart */
	public function removeAllItemFromSaleCart()
	{
        session(['saleCart' => []]);
        $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];

        $html = view('frontend.pages.saleCartDetailsByAjax')->render();
        if(count($cartName) > 0)
        {
            return response()->json([
                'status' => true,
                'success' => true,
                'data' => $html
                ]);
            }
        $html = view('frontend.pages.emptySaleCartByAjax')->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
	}
    /**remove All item from sale cart */

    /**Add To Sale Cart */
    public function updateSaleCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity   = $request->quantity;
        $cartName = [];
        $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];
        if($product_id)
        {
            if(array_key_exists($product_id,$cartName))
            {
                $cartName[$product_id]['quantity'] = $quantity;
            }
            session(['saleCart' => $cartName]);
        }
        $html = view('frontend.pages.saleCartDetailsByAjax')->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
    }
    /**Add To Sale Cart */

    /**View Product Details */
    public function productDetails(Request $request)
    {
        $data['product'] = Product::findOrFail($request->product_id);
        $html = view('frontend.pages.saleProductDetailsByAjax',$data)->render();
        return response()->json([
            'status' => true,
            'success' => true,
            'data' => $html
        ]);
    }
    /**View Product Details */





	public function homecare()
	{
		return view('frontend.pages.homecare');
	}


    public function homecarerequest()
    {

        $data['cities'] = City::all();
        $data['homecategories'] = Homecategory::all();
        $data['services'] = HomeService::all();

        return view('frontend.pages.homecareservice',$data);
    }


    public function homecareservicestore(Request $request)
    {
        if(!Auth::check())
        {

            $notification = array(
                'message' => 'Please Login First!',
                'alert-type' => 'error'
            );

            return redirect()->route('customer.login')->with($notification);
        }


         $validator = Validator::make($request->all(), [
            'category_id'     => 'required',
            'service_id'     => 'required',
            'email'     => 'required',
            'name'  => 'required',
            'familyname'  => 'required',
            'service'  => 'required',
            'city_id'  => 'required',
            'phonenumber'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $homecarerequest = New HomeCareServiceRequest();

            $homecarerequest->user_id         = Auth::user()->id;
            $homecarerequest->category_id     = $request->category_id;
            $homecarerequest->service_id      = $request->service_id;
            $homecarerequest->name            = $request->name;
            $homecarerequest->familyname      = $request->familyname;
            $homecarerequest->phonenumber     = $request->phonenumber;
            $homecarerequest->email           = $request->email;
            $homecarerequest->city_id         = $request->city_id;
            $homecarerequest->service         = $request->service;
            $homecarerequest->save();

            $notification = array(
                'message' => 'Request Send Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.dashboard')->with($notification);
        }
    }






	public function telemedicine()
	{
		return view('frontend.pages.telemedicine');
	}



	public function telemedicinerequest()
	{
		$data['cities'] = City::all();

		return view('frontend.pages.telemedicinerequest',$data);
	}


	public function telemedicinerequeststore(Request $request)
	{


		if(!Auth::check())
		{

			$notification = array(
                'message' => 'Please Login First!',
                'alert-type' => 'error'
            );

			return redirect()->route('customer.login')->with($notification);
		}




		 $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'name'  => 'required',
            'familyname'  => 'required',
            'service'  => 'required',
            'city_id'  => 'required',
            'phonenumber'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

        	$TeleMedicineService = New TeleMedicineService();

        	$TeleMedicineService->user_id 		= Auth::user()->id;
        	$TeleMedicineService->name 			= $request->name;
        	$TeleMedicineService->familyname 	= $request->familyname;
        	$TeleMedicineService->phonenumber   = $request->phonenumber;
        	$TeleMedicineService->email         = $request->email;
        	$TeleMedicineService->city_id       = $request->city_id;

        	$TeleMedicineService->service       = $request->service;

        	$TeleMedicineService->save();


        	$notification = array(
                'message' => 'Request Send Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.dashboard')->with($notification);
        }
	}










	public function medicaltourism()
	{
		return view('frontend.pages.medicaltourism');
	}


	public function medicaltourismrequest()
	{
		$data['categories'] = MedicalTourismCategory::all();
		$data['services']   = MedicalTourismService::all();
		$data['countries'] = COuntry::all();
		return view('frontend.pages.medicaltourismrequest',$data);
	}


	public function medicaltourismstore(Request $request)
	{
		if(!Auth::check())
		{

			$notification = array(
                'message' => 'Please Login First!',
                'alert-type' => 'error'
            );

			return redirect()->route('customer.login')->with($notification);
		}




		 $validator = Validator::make($request->all(), [
            'category_id'     => 'required',
            'service_id'     => 'required',
            'email'     => 'required',
            'name'  => 'required',
            'familyname'  => 'required',
            'service'  => 'required',
            'country_id'  => 'required',
            'phonenumber'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

        	$medicaltourismService = New TourismServiceRequest();

        	$medicaltourismService->user_id 		= Auth::user()->id;
        	$medicaltourismService->category_id		= $request->category_id;
        	$medicaltourismService->service_id 		= $request->service_id;
        	$medicaltourismService->name 			= $request->name;
        	$medicaltourismService->familyname 		= $request->familyname;
        	$medicaltourismService->phonenumber   	= $request->phonenumber;
        	$medicaltourismService->email         	= $request->email;
        	$medicaltourismService->country_id      = $request->country_id;
        	$medicaltourismService->service       	= $request->service;

        	$medicaltourismService->save();


        	$notification = array(
                'message' => 'Request Send Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.dashboard')->with($notification);
        }
	}












    public function doctorsearch(Request $request)
    {
        $data['cities'] = City::all();
        $data['typies'] = Type::all();
        $data['specilities'] = Specialty::all();



        $query = DoctorOrganizationBranch::query();


        if($request->city_id)
        {
            $data['city_id']    = $request->city_id;
            $query              = $query->where('organization_city_id',$request->city_id);
        }

        if($request->specility_id)
        {
            $data['specility_id']=  $request->specility_id;
            $query               =  $query->where('specialty_id',$request->specility_id);
        }

        if($request->type_id)
        {
            $data['type_id']    = $request->type_id;
            $query              = $query->where('organization_type_id',$request->type_id);
        }


        $data['searchdoctors']  = $query->get();





        return view('frontend.pages.doctorsearch',$data);
    }





    public function doctorappointment(Request $request)
    {
        if(!Auth::check())
        {

            $notification = array(
                'message' => 'Please Login First!',
                'alert-type' => 'error'
            );

            return redirect()->route('customer.login')->with($notification);
        }





        $datafind = DoctorOrganizationBranch::find($request->doctor_organization_branche_id);



        $newappointment = new DoctorAppointment();


        $newappointment->user_id        = Auth::user()->id;
        $newappointment->doctor_id      = $datafind->doctor_id;
        $newappointment->organization_branch_id = $datafind->organization_branch_id;
        $newappointment->doctor_schedule_id = $datafind->doctor_schedule_id;
        $newappointment->status         = 1;

        $newappointment->save();


        $notification = array(
                'message' => 'Request Send Successfully!',
                'alert-type' => 'success'
            );
        return redirect()->route('customer.dashboard')->with($notification);

    }












 	public function contact()
 	{
 		return view('frontend.pages.contact');
 	}


 	public function contactStore(Request $request)
 	{
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'phonenumber'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $cont = new Contract();
        $cont->name         = $request->name;
        $cont->familyname   = $request->familyname;
        $cont->phonenumber  = $request->phonenumber;
        $cont->email        = $request->email;
        $cont->city         = $request->city;
        $cont->address      = $request->address;
        $cont->save();

        $notification = array(
            'message' => 'Submitted Successfully!',
            'alert-type' => 'success'
        );
 		return redirect()->route('contact')->with($notification);
 	}








 	/* =============== customer login and registration ========================== */




	public function customerlogin()
	{
		return view('frontend.pages.login');
	}





	public function customerregistration()
	{

		$data['cities'] = City::all();

		return view('frontend.pages.registration',$data);
	}


	public function customerregistrationstore(Request $request)
	{

		$validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:users|email',
            'mobile'    => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $lastusercount = User::count();
            $lastuserid    = User::orderBy('id','DESC')->first();

            $user          = New User();

             if($lastusercount>0)
            {
                $user->user_uid = $lastuserid->user_uid+1;
            }
            else{
                $user->user_uid = 1001;
            }

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->mobile       = $request->mobile;
            $user->password     = bcrypt($request->password);
            $user->city_id      = $request->city_id;
            $user->address      = $request->address;
            $user->role_id      = 5;
            $user->type         = 2;
            $user->status       = 1;
            $user->save();


            $notification = array(
                'message' => 'Registration Complete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('frontend')->with($notification);

        }



	}




//    REGISTATION

    public  function doctorregistation(){
	    $data['city'] = City::get();
	    $data['specialist'] = Specialty::get();
	    $data['capital'] = Capital::get();
	    return view('frontend.pages.doctorRegistation',$data);
    }
    public  function doctorregistationstore(Request $request){
	    $request->validate([
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'specialty_id' => 'required',
	        'email' => 'required',
	        'password' => 'required',
        ]);

	    $data = new Doctor();
	    $data->first_name = $request->first_name;
	    $data->last_name = $request->last_name;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->specialty_id = $request->specialty_id;
        $data->save();

        $user = new  User();
        $user->doctor_id = $data->id;
        $user->name = $request->first_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->role_id = 4;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Doctor Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);



    }



    public  function medicalregistation(){
        $data['city'] = City::get();
        $data['capital'] = Capital::get();
        $data['specialist'] = Specialty::get();
	    return view('frontend.pages.medicalRegistation',$data);
    }

    public  function medicalregistationstore(Request $request){
        $request->validate([
            'name' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'address' => 'required',
	        'email' => 'required',
	        'password' => 'required',
	        'specialty_id' => 'required',
        ]);

        $data = new MedicalCenter();
        $data->name = $request->name;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->specialty_id = $request->specialty_id;
	    $data->address = $request->address;
        $data->save();



        $user = new  User();
        $user->medical_center_id = $data->id;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 5;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Medical Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);

    }
    public  function hospitalregistation(){
        $data['city'] = City::get();
        $data['capital'] = Capital::get();
        $data['specialist'] = Specialty::get();
	    return view('frontend.pages.hospitalRegistation',$data);
    }

    public  function  hospitalregistationstore(Request $request){

        $request->validate([
	        'name' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'address' => 'required',
	        'email' => 'required',
	        'password' => 'required',
	        'specialty_id' => 'required',
        ]);

	    $data = new Hospital();
	    $data->name = $request->name;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->specialty_id = $request->specialty_id;
	    $data->address = $request->address;
        $data->save();


        $user = new  User();
        $user->hospital_id = $data->id;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 6;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Hospital Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);
    }



    public  function farmacyregistation(){
        $data['city'] = City::get();
        $data['capital'] = Capital::get();
	    return view('frontend.pages.farmacy-registation',$data);
    }
    public  function  farmacyregistationstore(Request $request){
	    $request->validate([
	        'name' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'owner' => 'required',
	        'address' => 'required',
	        'email' => 'required',
	        'password' => 'required',
        ]);

	    $data = new Pharmacy();
	    $data->name = $request->name;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->owner = $request->owner;
	    $data->address = $request->address;
        $data->save();




        $user = new  User();
        $user->pharmacy_id = $data->id;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 7;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Hospital Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);
    }







 

    public function gym(){
        $data['city'] = City::get();
        return view('frontend.pages.gym-registation',$data);
    }

    public  function gymstore(Request $request){
        $request->validate([
            'name_en' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'owner' => 'required',
	        'address' => 'required',
	        'email' => 'required',
	        'password' => 'required',
        ]);

        $data = new Gym();
	    $data->name_en = $request->name_en;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->owner = $request->owner;
	    $data->address = $request->address;
        $data->save();


        
        $user = new  User();
        $user->gym_id = $data->id;
        $user->name = $request->name_en;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 8;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Gym Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);

    }

 

    
    public function beauty_center(){
        $data['city'] = City::get();
        return view('frontend.pages.beautycenter-registation',$data);
    }

    public  function beautycenterstore(Request $request){
        $request->validate([
            'name_en' => 'required',
	        'name_ar' => 'required',
	        'mobile' => 'required',
	        'owner' => 'required',
	        'address' => 'required',
	        'email' => 'required',
	        'password' => 'required',
        ]);

        $data = new BeautyCenter();
        $data->name_en = $request->name_en;
	    $data->name_ar = $request->name_ar;
	    $data->mobile = $request->mobile;
	    $data->email = $request->email;
	    $data->owner = $request->owner;
	    $data->address = $request->address;
        $data->save();


        
        $user = new  User();
        $user->beauty_center_id = $data->id;
        $user->name = $request->name_en;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role_id = 9;
        $user->password = Hash::make($request['password']);
        $user->save();

        $notification = array(
            'message' => 'Beauty Center Registation Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend')->with($notification);

    }




}
