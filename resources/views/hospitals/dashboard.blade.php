@extends('hospitals.layouts.app')
@section('title','Hospital Dashboard')
@section('content')

    <div id="content" class="content">

        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb float-xl-left">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-blue">
                    <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                    <div class="stats-info">
                        <h4>TOTAL TODAY NEWS</h4>
                        <p></p>
                    </div>
                    <div class="stats-link">
                        <a href="">View Detail</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-info">
                    <div class="stats-icon"><i class="fa fa-link"></i></div>
                    <div class="stats-info">
                        <h4>TOTAL NEWS</h4>
                        <p></p>
                    </div>
                    <div class="stats-link">
                        <a href="">View Detail  </a>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-orange">
                    <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4>Total Reporters</h4>
                        <p></p>
                    </div>
                    <div class="stats-link">
                        <a href="">View Detail  </a>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-red">
                    <div class="stats-icon"><i class="fa fa-clock"></i></div>
                    <div class="stats-info">
                        <h4>Total Writter</h4>
                        <p></p>
                    </div>
                    <div class="stats-link">
                        <a href="">View Detail  </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
