@extends('backend.layouts.app')
@section('title','Dashboard')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">City List</h4>
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
                    <thead>
                    <tr>
                        <th width="1%">SL</th>
                        <th class="text-nowrap">City Name</th>
                        <th class="text-nowrap">City Name(Ar)</th>
                        <th class="text-nowrap">Country</th>
                        <th class="text-nowrap">capital</th>
                        <th class="text-nowrap">Status</th>

                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cities as  $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->name_ar }}</td>
                            <td>{{$data->country->name}}</td>
                            <td>{{$data->capital->name}}</td>

                            <td>
                                @if($data->is_active==1)
                                    <p class="btn btn-primary btn-xs">Active</p>
                                @elseif($data->is_active==2)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('city.destroy',$data->id) }}" id="delete" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i> Delete
                                </a>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
