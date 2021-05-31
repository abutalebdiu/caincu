    @extends('frontend.layouts.app')
    @section('title', 'Profile')
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
                            <h6>Profile</h6>
                        </div>
                        <div class="hr-body">

                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>User ID</th>
                                        <td>{{ $customer->user_uid }}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{ $customer->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profile Photo</th>
                                        <td>
                                            @if (Auth::user()->image != null)
                                                <img src="{{ asset(Auth::user()->image) }}" alt="" width="30%">
                                            @else
                                                <img src="{{ asset('public/frontend/images/logo') }}/user.png" alt=""
                                                    width="30%">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <td><a href="{{ route('customer.profile.edit') }}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i> Edit</a></td>
                                    </tr>

                                </tbody>
                            </table>



                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--END USER DASHBOARD-->


        @include('frontend.clients.mobilemenu')


    @endsection
