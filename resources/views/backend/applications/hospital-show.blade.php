
@extends('backend.layouts.app')
@section('title','Hospital Show')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Hospital Show</h4>
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
                    <div style="text-align: right"><span class="text-capitalize"><a class="btn btn-primary" href="{{route('application.hospital')}}">Hospital</a></span></div>

                    <tr>
                        <th>name</th>
                        <th>{{ $hospital->name }}</th>

                    </tr>
                    <tr>
                        <th>Arbic Name</th>
                        <th>{{ $hospital->name_ar }}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{ $hospital->mobile }}</th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th>{{ $hospital->phone }}</th>
                    </tr>
                    <tr>
                        <th>capacity</th>
                        <th>{{ $hospital->capacity }}</th>
                    </tr>
                    <tr>
                        <th>doctor</th>
                        <th>{{ $hospital->doctor }}</th>
                    </tr>
                    <tr>
                        <th>nurse</th>
                        <th>{{ $hospital->nurse }}</th>
                    </tr>
                    <tr>
                        <th>Establisted</th>
                        <th>{{ $hospital->stabliste }}</th>
                    </tr>
                    <tr>
                        <th>capital</th>
                        <th>{{ $hospital->capital?$hospital->capital->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>city</th>
                        <th>{{ $hospital->city?$hospital->city->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>photo</th>
                        <th>{{ $hospital->photo }}</th>
                    </tr>
                    <tr>
                        <th>address</th>
                        <th>{{ $hospital->address }}</th>
                    </tr>
                    <tr>
                        <th>email</th>
                        <th>{{ $hospital->email }}</th>
                    </tr>
                    <tr>
                        <th>status</th>
                        <th>{{ $hospital->status ==1?'Active': "Inactive" }}</th>
                    </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
