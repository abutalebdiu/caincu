@extends('frontend.layouts.app')
@section('title', 'Tele Medicine')
@section('content')


    <!--    TELA MEDICINE DISCRIPT-->
    <section class="tele-medicine py-5">
        <div class="container">
            <div class="row">
                <div class="tele-medicine-box">
                    <h2>@lang('homepage.healthcareforfamily')</h2>
                    <div class="dot-div mb-4">
                        <span class="dot first-dot"></span>
                    </div>

                    <div class="tele-dedicine-details">
                        @lang('homepage.healthcareforfamilytext')
                        @lang('homepage.healthcareforfamilytext_2')



                        <div class="text-center">
                            <a href="{{ route('telemedicine.request') }}"
                                class="btn-grad text-center">@lang('page.askcareincubator')</a>
                               <a href="#" class="btn-grad">@lang('page.downloadtheapplication')</a> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--   END TELA MEDICINE DISCRIPT-->









@endsection
