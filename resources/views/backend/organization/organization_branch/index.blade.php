@extends('backend.layouts.app')
@section('title','Organization Branch List')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Organization Branch List</h4>
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
                        <th class="text-nowrap">Org Beanch Name</th>
                        <th class="text-nowrap">Org Beanch Name Arbic</th>
                        <th class="text-nowrap">Organization</th>
                        <th class="text-nowrap">Organization Type</th>
                        <th class="text-nowrap">City</th>
                        <th class="text-nowrap">Address</th>
                        <th class="text-nowrap">Phone</th>
                        <th class="text-nowrap">Mobile</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($org_br as  $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->name_ar }}</td>
                            <td>{{ $data->org->name }}</td>
                            <td>{{ $data->orgtype ? $data->orgtype->name:'no user'  }}</td>
                            <td>{{ $data->city ? $data->city->name : 'no user'  }}</td>
{{--                            <td>{{ $data->city->name }}</td>--}}
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->mobile }}</td>
                            <td>{{ $data->email }}</td>

                            <td>
                                <a href="{{ route('org_branch.destroy',$data->id) }}" id="delete" class="btn btn-xs btn-danger mb-2">
                                    <i class="fa fa-times"></i> Delete
                                </a>
                                <a href="{{ route('org_branch.edit',$data->id) }}" class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i> Edit
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
