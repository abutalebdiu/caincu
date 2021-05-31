<?php

namespace App\Http\Controllers\Backend\Organization;

use App\Http\Controllers\Controller;
use App\Model\Country\City;
use App\Model\Organization\Organization;
use App\Model\Organization\OrganizationType;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['org'] = Organization::latest()->get();
        return view('backend.organization.organization.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['org_types'] = OrganizationType::get();
        $data['cities'] = City::get();
        return view('backend.organization.organization.create',$data);
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
            'organization_type_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $data = new Organization();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->organization_type_id = $request->organization_type_id;
        $data->city_id = $request->city_id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Orgation Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org.index')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['org_types'] = OrganizationType::get();
        $data['cities'] = City::get();
        $data['org'] = Organization::find($id);
        return view('backend.organization.organization.edit',$data);
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
            'organization_type_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $data = Organization::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->organization_type_id = $request->organization_type_id;
        $data->city_id = $request->city_id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Orgation Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =  Organization::find($id)->delete();

        $notification = array(
            'message' => 'Organization  Delete Successfully!',
            'alert-type' => 'danger'
        );

        return redirect()->route('org.index')->with($notification);
    }
}
