@extends('frontend.layouts.app')
@section('title', 'Edit Customer Profile')
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
                        <h6>Edit Customer Profile</h6>
                    </div>
                    <div class="hr-body">

                        <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td> <input type="text" name="name" value="{{ $student->name }}"
                                                class="form-control" placeholder="Student name"> </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td> <input type="text" name="email" value="{{ $student->email }}"
                                                class="form-control" placeholder="Student name"> </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td> <input type="text" name="mobile" value="{{ $student->mobile }}"
                                                class="form-control" placeholder="Student name"></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td> <input type="text" name="address" value=" {{ $student->address }}"
                                                class="form-control" placeholder="Student name"></td>
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

                                            <br>
                                            <br>
                                            <input type="file" name="image" value="" class="form-control"
                                                placeholder="image">


                                        </td>
                                    </tr>



                                    <tr>
                                        <th>Action</th>
                                        <td> <button type="submit" class="btn btn-primary">Submit</button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>



                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--END USER DASHBOARD-->


    @include('frontend.clients.mobilemenu')


@endsection
