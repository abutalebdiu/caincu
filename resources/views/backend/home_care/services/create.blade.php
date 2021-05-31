@extends('backend.layouts.app')
@section('title','Create Home Care Service')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Create Home Care Service</h4>
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
                        <form action="{{ route('home_care_service.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Home Care Service Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Home Care Service Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Home Care Service Name Arbic</label>
                                <input type="text" name="name_ar" class="form-control" placeholder="Home Care Service Name (Ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cat">Medical Tourism Category</label>
                                <select name="category_id" id="cat" class="form-control">
                                    <option value="" selected>--select--</option>
                                    @foreach($home_cats as $home_cat)
                                        <option value="{{ $home_cat->id }}"> {{ $home_cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="2">Deactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('home_care_service.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
