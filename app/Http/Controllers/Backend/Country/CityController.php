<?php

namespace App\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use App\Model\Country\Capital;
use App\Model\Country\City;
use App\Model\Country\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cities'] = city::get();
        return view('backend.country.city.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countrys']=Country::get();
        $data['capitals']=Capital::get();
        return view('backend.country.city.create',$data);
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
            'country_id' => 'required',
            'capital_id' => 'required',
        ]);

        $data = new City();
        $data->name = $request->name;
        $data->name_ar = $request->name_ar;
        $data->country_id = $request->country_id;
        $data->capital_id = $request->capital_id;
        $data->save();

        $notification = array(
            'message' => 'City Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('city.create')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function show(Capital $capital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function edit(Capital $capital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capital $capital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Country\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data =  City::find($id)->delete();

        $notification = array(
            'message' => 'City Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('city.index')->with($notification);
    }
}
