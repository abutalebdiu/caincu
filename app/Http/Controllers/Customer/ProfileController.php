<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data['customer'] = User::find($id);
        return view('frontend.clients.profile',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        return view('frontend.clients.setting');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $data['student'] = User::find($id);
        return view('frontend.clients.editprofile',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,'.Auth::user()->id,
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $admin = User::find(Auth::user()->id);

            $admin->name    = $request->name;
            $admin->email   = $request->email;
            $admin->mobile  = $request->mobile;
             
            $image = $request->image;


            if($image){
                $uniqname   = uniqid();
                $ext        = strtolower($image->getClientOriginalExtension());
                $filepath   = 'public/images/manpowers/';
                $imagename  = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $admin->image= $imagename; 
            }

            $admin->save();


            $notification = array(
                'message' => 'Profile Update Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.profile')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
