@extends('frontend.layouts.app')
@section('title', 'Home Care')
@section('content')


     <!--    PROVITE SECTION-->
    <section class="provide-section py-5">
        <div class="container">
            <div class="provide-box">
                <div class="provide-title">
                    <h3>@lang('homepage.provideforyourhealth')</h3>
                    <div class="dot-div">
                        <span class="dot first-dot"></span>
                    </div>
                </div>

                <div class="provide-tabs py-5">
                    <ul class="nav nav-p
                        ills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad active custom" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#personal-information" type="button" role="tab"
                                aria-controls="personal-information"
                                aria-selected="true">@lang('homepage.certifieddoctors')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad custom" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#qualification" type="button" role="tab" aria-controls="qualification"
                                aria-selected="false">@lang('homepage.accommodation')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad custom" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#experience" type="button" role="tab" aria-controls="experience"
                                aria-selected="false"> @lang('homepage.price')</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad custom" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#chember" type="button" role="tab" aria-controls="chember"
                                aria-selected="false">@lang('homepage.translator')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad custom" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery"
                                aria-selected="false">@lang('homepage.appointmen') </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btnn-grad custom" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#publications" type="button" role="tab" aria-controls="publications"
                                aria-selected="false">@lang('homepage.assurance')</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="personal-information" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4>@lang('homepage.certifieddoctors')</h4>
                                            <p>
                                                @lang('homepage.certifieddoctors_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="qualification" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4>@lang('homepage.accommodation')</h4>
                                            <p>
                                                @lang('homepage.accommodation_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4> @lang('homepage.price')</h4>
                                            <p>
                                                @lang('homepage.price_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="chember" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4>@lang('homepage.translator')</h4>
                                            <p>
                                                @lang('homepage.translator_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4>@lang('homepage.appointmen') </h4>
                                            <p>
                                                @lang('homepage.appointmen_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="publications" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="provide-details py-3">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="provide-details-txt">
                                            <h4>@lang('homepage.assurance')</h4>
                                            <p>
                                                @lang('homepage.assurance_d')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-5 d-none d-sm-block">
                                        <div class="provide-details-image" style="border-left: none;border-right:none;">
                                            <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg"
                                                alt="provide photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  END  PROVITE SECTION-->

    <!--    CONSULTANCY SECTION-->
    <div class="service-section py-5">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <div class="col-12 pb-4">
                        <h4>@lang('homepage.thehighest_t')</h4>
                        <div class="dot-div">
                            <span class="dot first-dot"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="h-care-box">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/hiest-care/1.png" class="card-img-top"
                                alt="service-image">
                            <div class="card-body">
                                <h6>
                                    @lang('homepage.medication')
                                </h6>
                                <p>
                                    @lang('homepage.medication_d')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="h-care-box">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/hiest-care/2.png" class="card-img-top"
                                alt="service-image">
                            <div class="card-body">
                                <h6>@lang('homepage.heartcare')</h6>
                                <p>
                                    @lang('homepage.heartcare_d')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="h-care-box">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/hiest-care/3.png" class="card-img-top"
                                alt="service-image">
                            <div class="card-body">
                                <h6>@lang('homepage.overallhealthcare')</h6>
                                <p>
                                    @lang('homepage.overallhealthcare_d')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="h-care-box">
                        <div class="card">
                            <img src="{{ asset('public/frontend') }}/images/hiest-care/4.png" class="card-img-top"
                                alt="service-image">
                            <div class="card-body">
                                <h6>@lang('homepage.carecure')</h6>
                                <p>
                                    @lang('homepage.carecure_D')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--  END CONSULTANCY SECTION-->


    <!--    CONSULTANCY SECTION-->
    <div class="service-section healthcare py-5">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <div class="col-12 pb-4">
                        <h4>@lang('page.healthcareconsultancy')</h4>
                        <div class="dot-div">
                            <span class="dot first-dot"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}\images/consultancy/1Human_Resource.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>
                                    @lang('page.humanresource')
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}/images/consultancy/2Health_Care_Management.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>@lang('page.healthcaremanagement')</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}/images/consultancy/3Healthcare_Solutions.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>@lang('page.healthcaresolutions')</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}/images/consultancy/4Certification_Courses.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>@lang('page.certificationcourses')</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}/images/consultancy/5Quality.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>@lang('page.quality')</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-image-box">
                                <img src="{{ asset('frontend') }}/images/consultancy/6Medical_Camp.jpg" class="card-img-top" alt="service-image">
                            </div>
                            <div class="card-body">
                                <h6>@lang('page.edicalcamp') </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  END CONSULTANCY SECTION-->










@endsection
