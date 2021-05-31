
@extends('backend.layouts.app')
@section('title','Medical-center Show')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Medical center Show</h4>
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
                        <div style="text-align: right"><span class="text-capitalize"><a class="btn btn-primary" href="{{route('application.medical-center')}}">Medical Center</a></span></div>

                    <tr>
                        <th>name</th>
                        <th>{{ $medical->name }}</th>

                    </tr>
                    <tr>
                        <th>user name</th>
                        <th>{{ $medical->user_name }}</th>

                    </tr>
                    <tr>
                        <th>owner name</th>
                        <th>{{ $medical->owner }}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{ $medical->mobile }}</th>
                    </tr>
                        <tr>
                        <th>email</th>
                        <th>{{ $medical->email }}</th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th>{{ $medical->phone }}</th>
                    </tr>
                    <tr>
                        <th>establiste</th>
                        <th>{{ $medical->stabliste }}</th>
                    </tr>
                    <tr>
                        <th>capacity</th>
                        <th>{{ $medical->capacity }}</th>
                    </tr>
                    <tr>
                        <th>city</th>
                        <th>{{ $medical->city?$medical->city->name: '' }}</th>
                    </tr>
                    <tr>
                        <th>licence	</th>
                        <th>{{ $medical->licence }}</th>
                    </tr>
                    <tr>
                        <th>photo</th>
                        <th><img src="{{ asset($medical->photo) }}" alt="" width="100">
                            <a href="{{asset($medical->photo)}}"download>Download</a>
                        </th>
                    </tr>

                    <tr>
                        <th>address</th>
                        <th>{{ $medical->address }}</th>
                    </tr>
                    <tr>
                        <th>status</th>
                        <th>{{ $medical->status ==1?'Active': "Inactive" }}</th>
                    </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
