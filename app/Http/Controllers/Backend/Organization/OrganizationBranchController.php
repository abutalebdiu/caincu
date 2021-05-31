<?php

namespace App\Http\Controllers\Backend\Organization;

use App\Http\Controllers\Controller;
use App\Model\Country\City;
use App\Model\Organization\Organization;
use App\Model\Organization\OrganizationBranch;
use App\Model\Organization\OrganizationType;
use Illuminate\Http\Request;

class OrganizationBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['org_br'] = OrganizationBranch::get();
        return view('backend.organization.organization_branch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['orgs'] = Organization::get();
        $data['org_types'] = OrganizationType::get();
        $data['citys'] = City::get();
        return view('backend.organization.organization_branch.create',$data);
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
            'organization_id' => 'required',
            'organization_type_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

		$data = new OrganizationBranch();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->organization_id = $request->organization_id;
        $data->organization_type_id = $request->organization_type_id;
        $data->city_id = $request->city_id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Organization Branch Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org_branch.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Organization\OrganizationBranch  $organizationBranch
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationBranch $organizationBranch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Organization\OrganizationBranch  $organizationBranch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['org_br'] = OrganizationBranch::find($id);
        $data['orgs'] = Organization::get();
        $data['org_types'] = OrganizationType::get();
        $data['citys'] = City::get();
        return view('backend.organization.organization_branch.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Organization\OrganizationBranch  $organizationBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'organization_id' => 'required',
            'organization_type_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        $data = OrganizationBranch::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->organization_id = $request->organization_id;
        $data->organization_type_id = $request->organization_type_id;
        $data->city_id = $request->city_id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Organization Branch update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org_branch.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Organization\OrganizationBranch  $organizationBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs =  OrganizationBranch::find($id)->delete();

        $notification = array(
            'message' => 'Organization Branch Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('org_branch.index')->with($notification);
    }
}
