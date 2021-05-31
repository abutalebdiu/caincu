
@extends('backend.layouts.app')
@section('title','Gym Show')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Gym Show</h4>
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
                        <div style="text-align: right"><span class="text-capitalize"><a class="btn btn-primary" href="{{route('application.gym')}}">Gym</a></span></div>

                    <tr>
                        <th>name</th>
                        <th>{{ $gym->name_en }}</th>

                    </tr>
                    <tr>
                        <th>name ababic</th>
                        <th>{{ $gym->name_ar }}</th>

                    </tr>
                    <tr>
                        <th>owner name</th>
                        <th>{{ $gym->owner }}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{ $gym->mobile }}</th>
                    </tr>
                        <tr>
                        <th>email</th>
                        <th>{{ $gym->email }}</th>
                    </tr>
                   
                    <tr>
                        <th>city</th>
                        <th>{{ $gym->city?$gym->city->name: '' }}</th>
                    </tr>
                
                    <tr>
                        <th>address</th>
                        <th>{{ $gym->address }}</th>
                    </tr>
                    <tr>
                        <th>status</th>
                        <th>{{ $gym->status ==1?'Active': "Inactive" }}</th>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
