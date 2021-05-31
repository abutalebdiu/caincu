@extends('frontend.layouts.app')
@section('title', 'Tele Medicine Service')
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
                        @lang('customerdashboard.telemedicineservice')
                        </h6>


                    </div>
                    <div class="hr-body">

                        <div class="pt-4 table-responsive">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Family Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <body>
                                    @foreach ($teleMedicineServices as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->familyname }}</td>
                                            <td>{{ $service->phonenumber }}</td>
                                            <td>{{ $service->email }}</td>
                                            <td>{{ $service->city ? $service->city->name : '' }}</td>
                                            <td>{{ $service->service }}</td>
                                            <td>
                                                @if ($service->status == 1)
                                                    <p class="btn btn-warning btn-sm">Request</p>
                                                @elseif($service->status==2)
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
