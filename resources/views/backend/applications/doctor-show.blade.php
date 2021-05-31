
@extends('backend.layouts.app')
@section('title','Doctor Show')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Doctor Show</h4>
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
                <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                    <tbody>
                    <div style="text-align: right"><span class="text-capitalize"><a class="btn btn-primary" href="{{route('application.doctor')}}">Doctor</a></span></div>

                    <tr>
                        <th>name</th>
                        <th>{{ $doctor->name }}</th>

                    </tr>
                    <tr>
                        <th>Arbic Name</th>
                        <th>{{ $doctor->name_ar }}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{ $doctor->mobile }}</th>
                    </tr>

                    <tr>
                        <th>designation</th>
                        <th>{{ $doctor->designation }}</th>
                    </tr>
                    <tr>
                        <th>degree</th>
                        <th>{{ $doctor->degree }}</th>
                    </tr>
                    <tr>
                        <th>specialty</th>
                        <th>{{ $doctor->specialty?$doctor->specialty->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>capital</th>
                        <th>{{ $doctor->capital?$doctor->capital->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>city</th>
                        <th>{{ $doctor->city?$doctor->city->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>licence</th>
                        <th>{{ $doctor->licence }}</th>
                    </tr>
                    <tr>
                        <th>passing year</th>
                        <th>{{ $doctor->passing_year }}</th>
                    </tr>
                    <tr>
                        <th>certificate</th>
                        <th><a href="{{asset($doctor->certificate)}}" download>Download</a></th>
                    </tr>
                    <tr>
                        <th>photo</th>
                        <th><img src="{{asset($doctor->photo)}}" alt="" width="100">
                            <a href="{{asset($doctor->photo)}}" download>download</a>
                        </th>
                    </tr>
                    <tr>
                        <th>address</th>
                        <th>{{ $doctor->address }}</th>
                    </tr>
                    <tr>
                        <th>status</th>
                        <th>{{ $doctor->status ==1?'Active': "Inactive" }}</th>
                    </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
