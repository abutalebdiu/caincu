<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Unit;
use App\User;
use Validator;
use Auth;
use Session;


use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::latest()->where('status',1)->get();
        return view('backend.products.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::latest()
                                    ->where('parent_id',0)
                                    ->get();
        $data['brands']     = Brand::latest()->get();
        $data['units']     = Unit::latest()->get();
        $data['users']     = User::latest()->get();
        

         return view('backend.products.create',$data);
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

            $lastproductcount = Product::count();
            $lastproductid    = Product::orderBy('id','DESC')->first();

            $product              = New Product();

             if($lastproductcount>0)
            {
                $product->productuid         = $lastproductid->productuid+1;
            }
            else{
                $product->productuid         = 1001;
            } 

            $product->title       = $request->name;
            $product->ar_title    = $request->ar_name;
            $product->slug        = $request->slug;
            $product->generic     = $request->generic;
            $product->vendor_id   = $request->vendor_id;
            $product->category_id = $request->category_id;
            $product->main_category_id= $request->category_id;
            $product->brand_id    = $request->brand_id;
            $product->unit_id     = $request->unit_id ;
            $product->price       = $request->price ;

            $image = $request->productimage;

            if(isset($image)){
                $ext = $image->getClientOriginalExtension();
                $rand = mt_rand(1000000, 9999999);
                $date = Carbon::now()->toDateString();
                $image_name = $request->slug.'-'.$date.'-'.$rand .'.'.$ext;

                 //check Category file directy 
                 if(!Storage::disk('public')->exists('images/products')){
                    Storage::disk('public')->makeDirectory('images/products');
                 }
                 //resize image for upload
                 $imageSize = Image::make($image)->resize(500,350)->save($ext);
                 //upload in the Storage folder..
                 Storage::disk('public')->put('images/products/'.$image_name,$imageSize);
            }else{
                $image_name ='default.png';
            }

            $product->default_image  = $image_name;

            /* if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/products/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $product->default_image  = $imagename; 
            } */
  
            $product->description = $request->description;
            $product->status      = 1;
            $product->save();

            $notification = array(
                'message' => 'Product Create Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('product.create')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::latest()
                                            ->where('parent_id',0)
                                            ->get();

        $data['brands']     = Brand::latest()->get();
        $data['units']      = Unit::latest()->get();
        $data['users']      = User::latest()->get();


         $data['product'] = Product::find($id);

         return view('backend.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
 
            $product              = Product::find($id);

            $product->title       = $request->name;
            $product->ar_title    = $request->ar_name;
            $product->slug        = $request->slug;
            $product->generic     = $request->generic;
            $product->vendor_id   = $request->vendor_id;
            $product->category_id = $request->category_id;
            $product->main_category_id= $request->category_id;
            $product->brand_id    = $request->brand_id;
            $product->unit_id     = $request->unit_id ;
            $product->price       = $request->price ;


            $image = $request->productimage;

            if(isset($request->productimage)){
                $ext = $image->getClientOriginalExtension();
                $rand = mt_rand(1000000, 9999999);
                $date = Carbon::now()->toDateString();
                $image_name = $request->slug.'-'.$date.'-'.$rand .'.'.$ext;

                 //check Category file directy 
                 if(!Storage::disk('public')->exists('images/products')){
                    Storage::disk('public')->makeDirectory('images/products');
                 }

                if($request->productimage)
                {
                    //Old image check and Delete
                    if(Storage::disk('public')->exists('images/products/'.$product->default_image)){
                        Storage::disk('public')->delete('images/products/'.$product->default_image);
                    }
                }   

                //resize image for upload
                $imageSize = Image::make($image)->resize(500,350)->save($ext);
                //upload in the Storage folder..
                Storage::disk('public')->put('images/products/'.$image_name,$imageSize);
            }else{
                $image_name ='default.png';
            }

            $product->default_image  = $image_name;


            /* if($image){
                unlink($product->image);
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/products/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $product->default_image  = $imagename; 
            } */


            $product->description = $request->description;
            $product->save();

            $notification = array(
                'message' => 'Product Update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('product.index')->with($notification);

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
        $product = Product::find($id);

        /* //check Category file directy 
        if(!Storage::disk('public')->exists('images/products')){
            Storage::disk('public')->makeDirectory('images/products');
        }
        //Old image check and Delete
        if(Storage::disk('public')->exists('images/products/'.$product->default_image)){
            Storage::disk('public')->delete('images/products/'.$product->default_image);
        } */
        $product->status = 0;
        $product->save();

        $notification = array(
            'message' => 'Product Delete Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }
}
