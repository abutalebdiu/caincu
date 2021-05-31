<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Unit;
use Validator;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['units'] = Unit::orderBy('id','DESC')
                                             ->get();
        return view('backend.units.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.units.add');
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
            'ar_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{


            $unit          = New Unit();
            $unit->name    = $request->name;
            $unit->ar_name    = $request->ar_name;
            $unit->status          = 1;
            $unit->save();

            $notification = array(
                'message' => 'Unit create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('unit.create')->with($notification);

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

         $data['unit'] = Unit::find($id);
         return view('backend.units.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['unit'] = Unit::find($id);
        return view('backend.units.edit',$data);
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
            'ar_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{


            $unit          =  Unit::find($id);
            $unit->name    = $request->name;
            $unit->ar_name = $request->ar_name;
            $unit->status          = 1;
            $unit->save();

            $notification = array(
                'message' => 'Unit update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('unit.index')->with($notification);

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
            $unit  =  Unit::find($id);
            $unit->status  = 0;
            $unit->save();

            $notification = array(
                'message' => 'Unit delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('unit.index')->with($notification);
    }
}
