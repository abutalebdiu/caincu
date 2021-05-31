@extends('frontend.layouts.app')
@section('title', 'Customer Dashboard')
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
                        <h6>@lang('customerdashboard.order')</h6>

                    </div>
                    <div class="hr-body">
                         <div class="pt-4 table-responsive">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Invoice No</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>

                                <body>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$sale->order_no}}</td>
                                            <td>{{$sale->total_amount}}</td>
                                            <td>{{$sale->quantity}}</td>
                                            <td>{{date('Y-m-d h:i:s ',strtotime($sale->sale_date))}}</td>
                                            {{-- <td>{{$sale->order_status}}</td> --}}
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
