<?php

namespace App\Http\Controllers\Backend\MedicalToursim;

use App\Http\Controllers\Controller;
use App\Model\MedicalTourism\Category;
use App\Model\MedicalTourism\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['catagorys']= Service::get();
        return view('backend.medical_tourism.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorys'] = Category::get();
        return view('backend.medical_tourism.services.create',$data);
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
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $data = new Service();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Medical Tourism service Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('medical_tourism_service.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MedicalTourism\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\MedicalTourism\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['service'] = Service::find($id);
        $data['categorys'] = Category::get();
        return view('backend.medical_tourism.services.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicalTourism\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $data = Service::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Medical Tourism service Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('medical_tourism_service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MedicalTourism\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs =  Service::find($id)->delete();

        $notification = array(
            'message' => 'Medical Tourism Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('medical_tourism_service.index')->with($notification);
    }
}
