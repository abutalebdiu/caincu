@extends('backend.layouts.app')
@section('title','Doctor Schedule With Branch Type')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Doctor Schedule With Branch Type</h4>
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
                        <th class="text-nowrap">Speciality</th>
                        <th class="text-nowrap">Organization</th>
                        <th class="text-nowrap">Organization Branch</th>
                        <th class="text-nowrap">City</th>
                        <th class="text-nowrap">Schedule Time</th>
                        <th class="text-nowrap">Type</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($schedules as  $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $schedule->doctor?$schedule->doctor->name:'' }}</td>
                            <td>{{ $schedule->specialty?$schedule->specialty->name:'' }}</td>
                            <td>{{ $schedule->org?$schedule->org->name:'' }}</td>
                            <td>{{ $schedule->organizationBranch?$schedule->organizationBranch->name:'' }}</td>
                            <td>{{ $schedule->city?$schedule->city->name:'' }}</td>
                            <td>{{ $schedule->doctorSchedule?$schedule->doctorSchedule->start_time:'' }} - {{ $schedule->doctorSchedule?$schedule->doctorSchedule->end_time:'' }}</td>
                            <td>
                                {{ $schedule->org_type?$schedule->org_type->name:'' }}
                            </td>
                            
                           
                            <td>
                                @if($schedule->is_active==1)
                                    <p class="btn btn-primary btn-xs">Active</p>
                                @elseif($schedule->is_active==2)
                                    <p class="btn btn-danger btn-xs">Deactive</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('organization.doctor.schedule.edit',$schedule->id) }}" class="btn btn-xs btn-success">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('organization.doctor.schedule.destroy',$schedule->id) }}" id="delete" class="btn btn-xs btn-danger">
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
