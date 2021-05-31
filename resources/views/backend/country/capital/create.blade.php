@extends('backend.layouts.app')
@section('title','Add New Capital')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Capital</h4>
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
                        <form action="{{ route('capital.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Capital Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Capital Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Capital Name(Ar)</label>
                                <input type="text" name="name_ar" class="form-control" placeholder="Capital Name(Ar)" />
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" id="country" class="form-control">
                                    <option value="" selected>--Select--</option>
                                    @foreach($countrys as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('capital.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
