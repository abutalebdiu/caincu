<?php

namespace App\Http\Controllers\Backend\Organization;

use App\Http\Controllers\Controller;
use App\Model\Organization\OrganizationType;
use Illuminate\Http\Request;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['org_type'] = OrganizationType::latest()->get();
       return view('backend.organization.organization_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('backend.organization.organization_type.create');
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
            'status' => 'required'
        ]);

        $data = new OrganizationType();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Orgation Type Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org_type.create')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $data['org_type'] = OrganizationType::find($id);
        return  view('backend.organization.organization_type.edit',$data);
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
            'status' => 'required'
        ]);

        $data = OrganizationType::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Orgation Type Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org_type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Doctor\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =  OrganizationType::find($id)->delete();

        $notification = array(
            'message' => 'Organization Type Delete Successfully!',
            'alert-type' => 'danger'
        );

        return redirect()->route('org_type.index')->with($notification);
    }
}
