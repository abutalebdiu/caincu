@extends('backend.layouts.app')
@section('title','Doctor List')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Doctor List</h4>
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
                        <th class="text-nowrap">Doctor Name</th>
                        <th class="text-nowrap">Organization</th>
                        <th class="text-nowrap">Start Time</th>
                        <th class="text-nowrap">End Time</th>
                        <th class="text-nowrap">Day</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($doctorschedules as  $doctorschedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $doctorschedule->doctor?$doctorschedule->doctor->name:'' }}</td>
                            <td>{{ $doctorschedule->organizationBranch?$doctorschedule->organizationBranch->name:'' }}</td>
                            <td>{{ $doctorschedule->start_time }}</td>
                          

                            <td>{{$doctorschedule->end_time }}</td>
                            <td>{{$doctorschedule->day }}</td>
                         
                           
                            <td>
                                @if($doctorschedule->is_active==1)
                                    <p class="btn btn-primary btn-xs">Active</p>
                                @elseif($doctorschedule->is_active==2)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('doctor_schedule.edit',$doctorschedule->id) }}" class="btn btn-xs btn-success">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('doctor_schedule.destroy',$doctorschedule->id) }}" id="delete" class="btn btn-xs btn-danger">
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
