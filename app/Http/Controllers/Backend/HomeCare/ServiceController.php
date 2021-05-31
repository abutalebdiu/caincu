<?php

namespace App\Http\Controllers\Backend\HomeCare;

use App\Http\Controllers\Controller;
use App\Model\HomeCare\Category;
use App\Model\HomeCare\Service;
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
        $data['homeservices'] = Service::get();
        return view('backend.home_care.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['home_cats'] = Category::get();
        return view('backend.home_care.services.create',$data);
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
            'status' => 'required',
        ]);

        $data = new Service();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Home Care Service Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_care_service.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\HomeCare\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\HomeCare\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['home_cats'] = Category::get();
        $data['homeservices'] = Service::find($id);
        return view('backend.home_care.services.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\HomeCare\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $data = Service::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Home Care Service Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_care_service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\HomeCare\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs =  Service::find($id)->delete();

        $notification = array(
            'message' => 'Home Care Service Delect Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_care_service.index')->with($notification);
    }
}
