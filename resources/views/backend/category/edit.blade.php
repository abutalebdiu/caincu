@extends('backend.layouts.app')
@section('title','Edit Product Category')
@section('content')



            <div id="content" class="content">
            <div class="row">
                <div class="col-xl-6">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                        <div class="panel-heading">
                            <h4 class="panel-title">Edit Product Category</h4>
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
                            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                   <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text"  name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter Category Name" /> 
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Arabic Name</label>
                                        <input type="text"  name="ar_name" value="{{ $category->ar_name }}" class="form-control" placeholder="Enter Category Arabic Name" /> 
                                        <div class="text-danger">{{ $errors->first('ar_name') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <textarea name="slug" id="" class="form-control" placeholder="Enter Category Slug">{{ $category->slug }}</textarea>
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>


 
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                                    <a  class="btn btn-sm btn-default" href="{{ route('category.index') }}">Cancel</a>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
         </div>
        
        











@section('customjs')


@endsection
@endsection