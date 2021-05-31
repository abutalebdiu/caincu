<?php

namespace App\Http\Controllers\Backend\HomeCare;

use App\Http\Controllers\Controller;
use App\Model\HomeCare\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homecarecats'] = Category::get();
        return view('backend.home_care.categorys.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.home_care.categorys.create');
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

        $data = new Category();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Home Care Category Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_cat.index')->with($notification);
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
        $data['home_cat'] = Category::find($id);
        return view('backend.home_care.categorys.edit',$data);
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
            'status' => 'required'
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Home Care Category Update Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_cat.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\HomeCare\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs =  Category::find($id)->delete();

        $notification = array(
            'message' => 'Home Care Catagory Delect Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('home_cat.index')->with($notification);
    }
}
