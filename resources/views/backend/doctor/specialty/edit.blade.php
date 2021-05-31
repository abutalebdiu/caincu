@extends('backend.layouts.app')
@section('title','Specialty Edit')
@section('content')



    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Specialty Update</h4>
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
                        <form action="{{ route('specialty.update',$specialty->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Specialty Name</label>
                                <input type="text" name="name" value="{{$specialty->name}}" class="form-control" placeholder="Enter Specialty Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Specialty Arabic Name(</label>
                                <input type="text" name="name_ar" value="{{$specialty->name_ar}}" class="form-control" placeholder="Specialty Name (ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
 

                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('specialty.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
