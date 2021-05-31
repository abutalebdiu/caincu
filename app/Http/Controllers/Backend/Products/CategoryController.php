<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Validator;
use Auth;
 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id','DESC')
                                            ->where('status',1)
                                            ->where('child_id',0)
                                            ->get();
        return view('backend.category.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
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
            'slug' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{


            $category          = New Category();
            $category->name    = $request->name;
            $category->ar_name    = $request->ar_name;
            $category->slug    = $request->slug;
            $category->parent_id   = 0;
            $category->child_id    = 0;
            $category->position    = 1;
            
            
        

            $category->status          = 1;
            $category->save();

            $notification = array(
                'message' => 'Category create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('category.create')->with($notification);

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

         $data['category'] = Category::find($id);
         return view('backend.category.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        return view('backend.category.edit',$data);
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
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{


            $category          =  Category::find($id);
            $category->name    = $request->name;
            $category->ar_name = $request->ar_name;
            $category->slug    = $request->slug;
            $category->parent_id   = 0;
            $category->child_id    = 0;
            $category->position    = 1;
             

            $category->status          = 1;
            $category->save();

            $notification = array(
                'message' => 'Category update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);

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
            $category  =  Category::find($id);
            $category->status  = 0;
            $category->save();

            $notification = array(
                'message' => 'Category delete Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
    }
    
    
    
    
    
    
    
    
}
