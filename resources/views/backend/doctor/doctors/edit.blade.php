@extends('backend.layouts.app')
@section('title','Edit Doctor')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Edit Doctor</h4>
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
                        <form action="{{ route('doctor.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Doctor Name</label>
                                <input type="text" name="name" value="{{$doctor->name}}" class="form-control" placeholder="Doctor Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Doctor Name(Ar)</label>
                                <input type="text" name="name_ar" value="{{$doctor->name_ar}}" class="form-control" placeholder="Doctor Name(Ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">Specialty</label>
                                <select name="specialty_id" id="country" class="form-control">
                                    <option value="" selected>--Select--</option>
                                    @foreach($specialtys as $specialtys)
                                        <option  {{$doctor->specialty_id  == $specialtys->id ? 'selected' : '' }} value="{{$specialtys->id }}">{{$specialtys->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialty_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{$doctor->phone}}" id="phone" class="form-control" placeholder="Enter Phone" />
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{$doctor->email}}" id="email" class="form-control" placeholder="Enter Email" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city_id">City</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="" selected>--Select--</option>
                                    @foreach($cities as $cities)
                                        <option  {{$doctor->city_id  == $cities->id ? 'selected' : '' }} value="{{$cities->id }}">{{$cities->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{$doctor->address}}" id="address" class="form-control" placeholder="Enter Address" />
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Photo</label>
                                <input type="file" name="image" id="image" class="form-control" placeholder="Enter Address" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option  {{ $doctor->status==1 ? 'selected' : ''}} value="1">active</option>
                                    <option  {{ $doctor->status==2 ? 'selected' : '' }} value="2">inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('doctor.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
