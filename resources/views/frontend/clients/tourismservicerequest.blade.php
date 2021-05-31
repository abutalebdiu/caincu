@extends('frontend.layouts.app')
@section('title', 'Medicial Tourism Service Request')
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
                        @lang('customerdashboard.medicialtourismservicerequest')
                        </h6>

                    </div>
                    <div class="hr-body">

                        <div class="pt-4 table-responsive">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Family Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <body>
                                    @foreach ($medicinetourismes as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->category ? $service->category->name : '' }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->familyname }}</td>
                                            <td>{{ $service->phonenumber }}</td>
                                            <td>{{ $service->email }}</td>
                                            <td>{{ $service->country ? $service->country->name : '' }}</td>
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
