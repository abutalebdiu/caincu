<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Validator;


class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::orderBy('id','DESC')
                                            ->get();

        return view('backend.brands.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.add');
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
            'en_name' => 'required',
            'ar_name' => 'required',
            'slug' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{


            $brand             = New Brand();
            $brand->en_name    = $request->en_name;
            $brand->ar_name    = $request->ar_name;
            $brand->slug       = $request->slug;
            $brand->status          = 1;
            $brand->save();

            $notification = array(
                'message' => 'Brand create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('brand.create')->with($notification);

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
         $data['brands'] = Brand::find($id);
         return view('backend.brands.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['brand'] = Brand::find($id);
        return view('backend.brands.edit',$data);
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
            'en_name' => 'required',
            'ar_name' => 'required',
            'slug' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
 
            $brand             =  Brand::find($id);
            $brand->en_name    = $request->en_name;
            $brand->ar_name    = $request->ar_name;
            $brand->slug       = $request->slug;
            $brand->status          = 1;
            $brand->save();

            $notification = array(
                'message' => 'Brand Update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('brand.index')->with($notification);

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
            $brand  =  Brand::find($id)->delete();

            $notification = array(
                'message' => 'Brand delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('brand.index')->with($notification);
    }
    
}
