@extends('backend.layouts.app')
@section('title','Edit Product Unit')
@section('content')



            <div id="content" class="content">
            <div class="row">
                <div class="col-xl-6">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                        <div class="panel-heading">
                            <h4 class="panel-title">Edit Product Unit</h4>
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
                            <form action="{{ route('unit.update',$unit->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                   <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text"  name="name" value="{{ $unit->name }}" class="form-control" placeholder="Enter unit Name" /> 
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Arabic Name</label>
                                        <input type="text"  name="ar_name" value="{{ $unit->ar_name }}" class="form-control" placeholder="Enter unit Arabic Name" /> 
                                        <div class="text-danger">{{ $errors->first('ar_name') }}</div>
                                    </div>

  
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                                    <a  class="btn btn-sm btn-default" href="{{ route('unit.index') }}">Cancel</a>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
         </div>
        
        











@section('customjs')


@endsection
@endsection