@extends('backend.layouts.app')
@section('title','Add Product')
@section('content')



 			<div id="content" class="content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add New Product</h4>
                            <div class="panel-heading-btn"> 
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                            		<i class="fa fa-expand"></i>
                            	</a>
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                            		<i class="fa fa-redo"></i>
                            	</a> 
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                            		<i class="fa fa-minus"></i>
                            	</a> 
                            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                            		<i class="fa fa-times"></i>
                            	</a> 
                           </div>
                        </div>
                        <div class="panel-body">





                    <script>
                        function convertToSlug( str ) {
    
                              //replace all special characters | symbols with a space
                              str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
                                
                              // trim spaces at start and end of string
                              str = str.replace(/^\s+|\s+$/gm,'');
                                
                              // replace space with dash/hyphen
                              str = str.replace(/\s+/g, '-');   
                              document.getElementById("slug-text").innerHTML= str;
                              //return str;
                            }
                                            
                    </script>


 


                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            	@csrf
                                    
                                <div class="form-group">
                                    <label for="">Vendor</label>
                                     <select name="vendor_id" id="" class="form-control">
                                         <option value="">Select User</option>
                                         @foreach($users as $user)
                                         <option value="{{$user->id}}">{{$user->name }}</option>
                                         @endforeach
                                     </select>
                                    <div class="text-danger">{{ $errors->first('vendor_id') }}</div>
                                </div>

 

                                   <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text"  name="name" value="{{ old('name') }}" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  class="form-control" placeholder="Enter Product Name" /> 
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>
  

                                    <div class="form-group">
                                        <label for="">Product Arabic Name</label>
                                        <input type="text"  name="ar_name" value="{{ old('ar_name') }}" class="form-control" placeholder="Enter Category Arabic Name" /> 
                                        <div class="text-danger">{{ $errors->first('ar_name') }}</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <textarea name="slug" id="slug-text" class="form-control" placeholder="Enter Product Slug">{{ old('slug') }}</textarea>
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Generic</label>
                                        <textarea name="generic" class="form-control" placeholder="Enter Product Generic">{{ old('generic') }}</textarea>
                                        <div class="text-danger">{{ $errors->first('generic') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Category</label>
                                         <select name="category_id" id="" class="form-control">
                                             <option value="">Select Category</option>
                                             @foreach($categories as $category)
                                             <option value="{{$category->id}}">{{$category->name }}</option>
                                             @endforeach
                                         </select>
                                        <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Sub Category</label>
                                         <select name="sub_category_id" id="" class="form-control">
                                             <option value="">Select Sub Category</option>
                                              
                                         </select>
                                        <div class="text-danger">{{ $errors->first('sub_category_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Brand</label>
                                         <select name="brand_id" id="" class="form-control">
                                             <option value="">Select Category</option>
                                             @foreach($brands as $brand)
                                             <option value="{{ $brand->id }}">{{ $brand->en_name }}</option>
                                             @endforeach
                                         </select>
                                        <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Unit</label>
                                         <select name="unit_id" id="" class="form-control">
                                             <option value="">Select Unit</option>
                                             @foreach($units as $unit)
                                             <option value="{{$unit->id}}">{{ $unit->name }}</option>
                                             @endforeach
                                         </select>
                                        <div class="text-danger">{{ $errors->first('unit_id') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text"  name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter Product Price" /> 
                                        <div class="text-danger">{{ $errors->first('price') }}</div>
                                     </div>


                                     <div class="form-group">
                                        <label for="">Product Image</label>
                                        <input type="file"  name="productimage" value="{{ old('productimage') }}" class="form-control" placeholder="Enter product Image" /> 
                                        <div class="text-danger">{{ $errors->first('productimage') }}</div>
                                     </div> 


                                     <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Enter Product description">{{ old('description') }}</textarea>
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                    </div>
                                  
 
                                   
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                                    <a  class="btn btn-sm btn-default" href="{{ route('product.index') }}">Cancel</a>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
         </div>
        
        











@section('customjs')


@endsection
@endsection