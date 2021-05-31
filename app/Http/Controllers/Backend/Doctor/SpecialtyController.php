<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;

use App\Model\Doctor\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data['specialty'] = Specialty::latest()->get();
            return view('backend.doctor.specialty.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.doctor.specialty.add');
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
        ]);

        $data = new Specialty();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->save();

        $notification = array(
            'message' => 'Specialty Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('specialty.create')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date['specialty'] = Specialty::find($id);
        return view('backend.doctor.specialty.edit',$date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        $data = Specialty::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->save();

        $notification = array(
            'message' => 'Specialty Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('specialty.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $data =  Specialty::find($id)->delete();

            $notification = array(
                'message' => 'Specialty Delete Successfully!',
                'alert-type' => 'danger'
            );

            return redirect()->route('specialty.index')->with($notification);
    }
}
