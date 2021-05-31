@extends('backend.layouts.app')
@section('title','Organization Type List')
@section('content')


    <div id="content" class="content">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Organization Type List</h4>
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
                            <th>Serial</th>
                            <th>Invoice No</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <body>
                        @foreach ($orders as $sale)
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
                {{$orders->links()}}
            </div>
        </div>
    </div>




@endsection
