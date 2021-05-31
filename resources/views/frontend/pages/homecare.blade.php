@extends('frontend.layouts.app')
@section('title','Home Care')
@section('content')
 

 

    <!--    HOME CARE SECTION-->
    <section class="home-care py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="home-care-img-box">
                        <img src="{{ asset('public/frontend') }}/images/photo/home.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="clients-details">
                        <h4 class="pb-3">@lang('page.whatiscare')</h4>
                        <div class="dot-div mb-4">
                            <span class="dot first-dot flot_left"></span>
                        </div>
                        <p>
                            @lang('page.careincubator_1')
                        </p>
                        <p>
                            @lang('page.careincubator_2')
                        </p>
                        <p>
                            @lang('page.careincubator_3')
                        </p>
                        <p>
                            @lang('page.careincubator_4')
                        </p>
                        <p>
                            @lang('page.careincubator_5')
                        </p>

                        <p>
                           @lang('page.careincubator_6')
                        </p>
                        <p>
                            @lang('page.careincubator_7')
                        </p>
                        <p>
                            @lang('page.careincubator_8')
                        </p>
                        <p>
                            @lang('page.careincubator_9')
                        </p>
                        <p>
                            @lang('page.careincubator_10')
                        </p>
                        <p>
                           @lang('page.careincubator_11')
                        </p>
                        <p>
                            @lang('page.careincubator_12')
                        </p>
                        <p>
                            @lang('page.careincubator_13')
                           
                        </p>


                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <a href="{{ route('homecare.service') }}" class="btn-custom"> @lang('page.sendrequest')</a>
                </div>

            </div>
        </div>
    </section>
    <!--    HOME CARE SECTION-->





@endsection