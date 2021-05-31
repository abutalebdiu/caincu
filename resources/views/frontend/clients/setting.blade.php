@extends('frontend.layouts.app')
@section('title', 'Setting')
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
                        <h6>Setting</h6>

                    </div>
                    <div class="hr-body">

                        <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered table-hovered">

                                <tbody>
                                    <tr>
                                        <th>Old Password</th>
                                        <td> <input type="text" name="name" value="" class="form-control"
                                                placeholder="Old Password"> </td>
                                    </tr>
                                    <tr>
                                        <th>New Password</th>
                                        <td> <input type="text" name="email" value="" class="form-control"
                                                placeholder="New Password"> </td>
                                    </tr>
                                    <tr>
                                        <th>Confirm Password</th>
                                        <td> <input type="text" name="email" value="" class="form-control"
                                                placeholder="Confirm Password"> </td>
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
