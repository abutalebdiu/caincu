@extends('backend.layouts.app')
@section('title','Update Medical Tourism Categorys')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Update Medical Tourism Categorys</h4>
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
                        <form action="{{ route('medical_tourism_catagory.update',$cat->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Medical Tourism Category Name</label>
                                <input type="text" name="name" value="{{$cat->name}}" class="form-control" placeholder="Medical Tourism Category Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Medical Tourism Category Name Arabic</label>
                                <input type="text" name="name_ar" value="{{$cat->name_ar}}" class="form-control" placeholder="Medical Tourism Category Name (ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option  {{ $cat->status==1 ? 'selected' : ''}} value="1">active</option>
                                    <option  {{ $cat->status==2 ? 'selected' : '' }} value="2">inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('medical_tourism_catagory.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
