@extends('backend.layouts.app')
@section('title','Add New Doctor Schedule')
@section('content')

    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Doctor Schedule</h4>
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
                        <form action="{{ route('doctor_schedule.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
 

                            <div class="form-group">
                                <label for="country">Doctors</label>
                                <select name="doctor_id" id="doctor_id" class="form-control">
                                    <option value="" selected>--Select Doctors--</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="organization_branch_id">Organization Branch</label>
                                <select name="organization_branch_id" id="organization_branch_id" class="form-control">
                                    <option value="" selected>--Select--</option>
                                    @foreach($org_branchs as $org_branch)
                                        <option value="{{ $org_branch->id }}"> {{ $org_branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('organization_branch_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Start Time</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" placeholder="Enter start time" />
                                @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" placeholder="Enter end time" />
                                @error('end_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_time">Day</label>
                                 <textarea name="day" class="form-control" placeholder="Enter Day of duties"></textarea>
                                @error('day')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

 
                            

                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                            <a class="btn btn-sm btn-default" href="{{route('doctor_schedule.index')}}">Back</a>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
