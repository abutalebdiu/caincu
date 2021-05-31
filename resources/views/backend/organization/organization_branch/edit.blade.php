@extends('backend.layouts.app')
@section('title','update Organizination Branch')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">update Organizination Branch</h4>
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
                        <form action="{{ route('org_branch.update',$org_br->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Organization Branch Name</label>
                                <input type="text" name="name" value="{{$org_br->name}}" class="form-control" placeholder="Organization Type Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Organization Branch Name Arabic</label>
                                <input type="text" name="name_ar" value="{{$org_br->name_ar}}" class="form-control" placeholder="Organization Type Name (Ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="org">Organization</label>
                                <select name="organization_id" id="org" class="form-control">
                                    <option value="" selected>--select--</option>
                                    @foreach($orgs as $orgss)
                                        <option  {{$org_br->organization_id == $orgss->id ? 'selected' : '' }} value="{{$orgss->id}}">{{$orgss->name}}</option>
                                    @endforeach
                                </select>
                                @error('organization_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="org_type">Organization Type</label>
                                <select name="organization_type_id" id="org_type" class="form-control">
                                    <option value="" selected>--select--</option>
                                    @foreach($org_types as $org_type)
                                        <option  {{$org_br->organization_type_id == $org_type->id ? 'selected' : '' }} value="{{$org_type->id}}">{{$org_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('organization_type_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="org_type">City</label>
                                <select name="city_id" id="org_type" class="form-control">
                                    <option value="" selected>--select--</option>
                                    @foreach($citys as $city)
                                        <option  {{$org_br->city_id == $city->id ? 'selected' : '' }} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{$org_br->address}}" id="address" class="form-control" placeholder="Address" />
                                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{$org_br->phone}}" class="form-control" placeholder="Phone" />
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" id="mobile" value="{{$org_br->mobile}}" class="form-control" placeholder="Mobile" />
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{$org_br->email}}" class="form-control" placeholder="Email"/>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="2">Deactive</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('org_branch.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
