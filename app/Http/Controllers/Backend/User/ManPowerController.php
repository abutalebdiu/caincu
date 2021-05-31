<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ManPower;
use Validator;
use Auth;
 
class ManPowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['manpowers'] = ManPower::where('type',1)->where('status',1)->get();
        return view('backend.manpowers.writters.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manpowers.writters.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            
            $lastmancount = ManPower::count();
            $lastmanid = ManPower::orderBy('id','DESC')->first();

            $writter          = New ManPower();
            
             if($lastmancount>0)
            {
                $writter->man_power_uid   = $lastmanid->uid+1;
            }
            else{
                $writter->man_power_uid   = 201;
            }
            
            $writter->name    = $request->name;
            $writter->email    = $request->email;
            $writter->contact    = $request->contact;
            $writter->address    = $request->address;
            $writter->notes    = $request->notes;
            $writter->division_id    = 1;
            $writter->district_id    = 1;
            $writter->thana_id    = 1;
             
            

            $image = $request->image;
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/manpowers';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $writter->images  = $imagename;
                
            }

            $writter->status          = 1;
            $writter->save();

            $notification = array(
                'message' => 'writter create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['manpower'] = ManPower::find($id);
        return view('backend.manpowers.writters.edit',$data);
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
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            
            $lastmancount = ManPower::count();
            $lastmanid = ManPower::orderBy('id','DESC')->first();

            $writter          = New ManPower();
            
             if($lastmancount>0)
            {
                $writter->man_power_uid   = $lastmanid->uid+1;
            }
            else{
                $writter->man_power_uid   = 2001;
            }
            
            $writter->name    = $request->name;
            $writter->email    = $request->email;
            $writter->contact    = $request->contact;
            $writter->address    = $request->address;
            $writter->notes    = $request->notes;
             
            

            $image = $request->image;
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/manpowers';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $writter->images  = $imagename;
                
            }

            $writter->status          = 1;
            $writter->save();

            $notification = array(
                'message' => 'writter update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);

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

            $manpower  =  ManPower::find($id);
            $manpower->status  = 0;
            $manpower->save();

            $notification = array(
                'message' => 'writter delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);
   
        }






        /*for reporter */



         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reproterindex()
    {
        $data['manpowers'] = ManPower::where('type',1)->where('status',1)->get();
        return view('backend.manpowers.reporters.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reprotercreate()
    {
        return view('backend.manpowers.reporters.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reproterstore(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            
            $lastmancount = ManPower::count();
            $lastmanid = ManPower::orderBy('id','DESC')->first();

            $writter          = New ManPower();
            
             if($lastmancount>0)
            {
                $writter->man_power_uid   =$lastmanid->man_power_uid+1;
            }
            else{
                $writter->man_power_uid   = 201;
            }
            
            $writter->name    = $request->name;
            $writter->email    = $request->email;
            $writter->contact    = $request->contact;
            $writter->address    = $request->address;
            $writter->notes    = $request->notes;
             
            $writter->division_id    = 1;
            $writter->district_id    = 1;
            $writter->thana_id    = 1;
            

            $image = $request->image;
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/manpowers';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $writter->images  = $imagename;
                
            }

            $writter->type          = 2;
            $writter->status          = 1;
            $writter->save();

            $notification = array(
                'message' => 'writter create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reprotershow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reproteredit($id)
    {
        $data['manpower'] = ManPower::find($id);
        return view('backend.manpowers.reporters.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reproterupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            
            $lastmancount = ManPower::count();
            $lastmanid = ManPower::orderBy('id','DESC')->first();

            $writter          =  ManPower::findOrFail($id);
            
             if($lastmancount>0)
            {
                $writter->man_power_uid   = $lastmanid->man_power_uid+1;
            }
            else{
                $writter->man_power_uid   = 201;
            }
            
            $writter->name    = $request->name;
            $writter->email    = $request->email;
            $writter->contact    = $request->contact;
            $writter->address    = $request->address;
            $writter->notes    = $request->notes;
             
            

            $image = $request->image;
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/manpowers';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $writter->images  = $imagename;
                
            }

            
            $writter->save();

            $notification = array(
                'message' => 'writter update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reproterdestroy($id)
    {

            $manpower  =  ManPower::find($id);
            $manpower->status  = 0;
            $manpower->save();

            $notification = array(
                'message' => 'writter delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('writter.index')->with($notification);
   
        }






















}
