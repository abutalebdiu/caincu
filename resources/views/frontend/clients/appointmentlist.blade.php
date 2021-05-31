@extends('frontend.layouts.app')
@section('title', 'Doctor Appointment List')
@section('content')


    <!--USER DASHBOARD-->
    <section class="user-dashboard py-4">
        <div class="container">
            <div class="dashboard-area d-flex bd-highlight">


                @include('frontend.clients.menu')


                <div class="dashboard-main w-100 bd-highlight py-3">
                    <div class="dr-head">
                        <div class="ud-mobile">
                            <i class="fa fa-bars" id="ud-mobile-btn"></i>
                        </div>
                        <h6>
                        @lang('customerdashboard.doctorappointmentlist')
                        </h6>

                    </div>
                    <div class="hr-body">

                        <div class="pt-4 table-responsive">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Doctor Name</th>
                                        <th>Branch</th>
                                        <th>City</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <body>
                                    @foreach ($appointmentlists as $appointmentlist)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $appointmentlist->doctor ? $appointmentlist->doctor->name : '' }}</td>
                                            <td>{{ $appointmentlist->organizationBranch ? $appointmentlist->organizationBranch->name : '' }}
                                            </td>
                                            <td>{{ $appointmentlist->organizationBranch ? $appointmentlist->organizationBranch->city->name : '' }}
                                            </td>
                                            <td>{{ $appointmentlist->doctorSchedule ? $appointmentlist->doctorSchedule->start_time : '' }}
                                                -
                                                {{ $appointmentlist->doctorSchedule ? $appointmentlist->doctorSchedule->end_time : '' }}
                                            </td>
                                            <td>{{ $appointmentlist->created_at }}</td>

                                            <td>
                                                @if ($appointmentlist->status == 1)
                                                    <p class="btn btn-warning btn-sm">Request</p>
                                                @elseif($appointmentlist->status==2)
                                                    <p class="btn btn-success btn-sm"> Accepted </p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </body>
                            </table>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--END USER DASHBOARD-->


    @include('frontend.clients.mobilemenu')


@endsection
