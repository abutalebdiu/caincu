
@extends('backend.layouts.app')
@section('title','Pharmacy Show')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Pharmacy Show</h4>
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
                        <div style="text-align: right"><span class="text-capitalize"><a class="btn btn-primary" href="{{route('application.pharmacy')}}">Pharmacy</a></span></div>

                    <tr>
                        <th>name</th>
                        <th>{{ $pharmacy->name }}</th>

                    </tr>
                    <tr>
                        <th>user name</th>
                        <th>{{ $pharmacy->user_name }}</th>

                    </tr>
                    <tr>
                        <th>owner name</th>
                        <th>{{ $pharmacy->owner }}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{ $pharmacy->mobile }}</th>
                    </tr>
                        <tr>
                        <th>email</th>
                        <th>{{ $pharmacy->email }}</th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th>{{ $pharmacy->phone }}</th>
                    </tr>
                    <tr>
                        <th>capital</th>
                        <th>{{ $pharmacy->capital?$pharmacy->capital->name:'' }}</th>
                    </tr>
                    <tr>
                        <th>city</th>
                        <th>{{ $pharmacy->city?$pharmacy->city->name: '' }}</th>
                    </tr>
                    <tr>
                        <th>licence	</th>
                        <th>{{ $pharmacy->licence }}</th>
                    </tr>

                    <tr>
                        <th>address</th>
                        <th>{{ $pharmacy->address }}</th>
                    </tr>
                    <tr>
                        <th>status</th>
                        <th>{{ $pharmacy->status ==1?'Active': "Inactive" }}</th>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
