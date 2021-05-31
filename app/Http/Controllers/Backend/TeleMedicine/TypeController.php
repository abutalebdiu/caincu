<?php

namespace App\Http\Controllers\Backend\TeleMedicine;

use App\Http\Controllers\Controller;
use App\Model\TeleMedicine\Type;
use Illuminate\Http\Request;
use Validator;

class TypeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['typies'] = Type::orderBy('id','DESC')->get();
        return view('backend.typies.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.typies.add');
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


            $type               = New Type();
            $type->name         = $request->name;
            $type->ar_name      = $request->ar_name;
            $type->is_active    = 1;
            $type->save();

            $notification = array(
                'message' => 'Type create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('type.create')->with($notification);

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

         $data['type'] = Category::find($id);
         return view('backend.typies.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['type'] = Type::find($id);
        return view('backend.typies.edit',$data);
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


            $type          =  Type::find($id);
            $type->name    = $request->name;
            $type->ar_name = $request->ar_name;
             
            $type->save();

            $notification = array(
                'message' => 'type update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('type.index')->with($notification);

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
            $type  =  Type::find($id);
            $type->is_active  = 0;
            $type->save();

            $notification = array(
                'message' => 'Type Delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('type.index')->with($notification);
    }
    
    
}
