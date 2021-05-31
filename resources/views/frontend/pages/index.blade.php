@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')

    <!--    SLIDER SECTION-->
    <section class="slider-section">
        <div class="container-fluid">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public/frontend') }}/images/slider/slider1.png" class="d-block w-100"
                            alt="slider-photo">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/frontend') }}/images/slider/slider2.png" class="d-block w-100"
                            alt="slider-photo">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/frontend') }}/images/slider/slider3.png" class="d-block w-100"
                            alt="slider-photo">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/frontend') }}/images/slider/slider4.png" class="d-block w-100"
                            alt="slider-photo">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!--   END SLIDER SECTION-->

    <!--    HOME SECTION-->
    <section class="head-home py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="doctor-search-box py-5">
                        <h1> @lang('homepage.findsdoctor')</h1>

                        <div class="tabs-box py-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="btnn-grad active custom" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#deep-search" type="button" role="tab" aria-controls="deep-search" aria-selected="true"> @lang('homepage.deepsearch')</button>
                                </li> --}}
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="btnn-grad custom" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#doctor-search" type="button" role="tab" aria-controls="doctor-search" aria-selected="false">

                                    @lang('homepage.searchbydoctor')</button>
                                </li> --}}

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="deep-search" role="tabpanel"
                                    aria-labelledby="pills-home-tab">

                                    <div class="search-form py-4">
                                        <form action="{{ route('doctor.search') }}" method="get">
                                            <div class="row">
                                                <div class="search-input-box">
                                                    <select name="city_id" id="select_nice">
                                                        <option value="">--
                                                            {{ app()->getLocale() == 'en' ? 'City' : 'المدينة' }} --
                                                        </option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">
                                                                {{ app()->getLocale() == 'en' ? $city->name : $city->name_ar }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="search-input-box">
                                                    <select name="specility_id" id="select_nice2">
                                                        <option value="">--
                                                            {{ app()->getLocale() == 'en' ? 'Specialties' : 'التخصص' }}
                                                            --</option>
                                                        @foreach ($specilities as $specility)
                                                            <option value="{{ $specility->id }}">
                                                                {{ app()->getLocale() == 'en' ? $specility->name : $specility->name_ar }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="search-input-box" style="width: 100%;">
                                                    <select name="type_id" id="select_nice3">
                                                        <option value="">--
                                                            {{ app()->getLocale() == 'en' ? 'Type' : 'النوع' }} --
                                                        </option>
                                                        @foreach ($typies as $type)
                                                            <option value="{{ $type->id }}">
                                                                {{ app()->getLocale() == 'en' ? $type->name : $type->ar_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="search-input-box" id="select_ince4">
                                                    <input type="text" placeholder="@lang('homepage.doctorname')">
                                                </div> --}}
                                                <div class="search-button mt-2">
                                                    <button type="submit" class="btn-grad">
                                                        <i class="fa fa-search"></i>
                                                        @lang('homepage.search')</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="doctor-search" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">

                                    <div class="search-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="search-input-box w-100 mt-4" id="select_ince4">
                                                    <input type="text" placeholder="Doctor name" class="w-100">
                                                </div>
                                                <div class="search-button mt-2">
                                                    <a href="#" class="btn-grad">
                                                        <i class="fa fa-search"></i>
                                                        @lang('homepage.Search')</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 d-none d-lg-block">
                    <div class="home-right py-5">
                        <div class="doctor-box">
                            <div class="doctor-image">
                                <img src="{{ asset('public/frontend') }}/images/doctors/doctors.jpg" alt="doctor image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  END HOME SECTION-->




   
    
 
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     <h3>@lang('homepage.onlinepharmachy')</h3>
                     <p> @lang('homepage.onlinepharmachytext') </p>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6">
                    <ul class="first-ul list-unstyled nav flex-column">
                         @foreach ($categories as $category)
                            <li class="">
                                <a style="color:#8050fb" href="" class="nav-link"> 
                                 <i class="fa fa-check-circle"></i>   {{ app()->getLocale() == 'en' ? $category->name : $category->ar_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                    
                
                
                
            </div>
        </div>
    </section>
    
    








    <!--    HOME CARE SECTION-->
    <section class="home-care py-5">
        <div class="container">
            <div class="row">
                 
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="clients-details">

                        <h4 class="text-center mb-4"> @lang('homepage.homecare')</h4>
                         

                        @lang('homepage.whatcaretext')

                        {{-- <div>
                            <a href="{{ route('home.care') }}" class="btn-grad"> @lang('homepage.seedetails')</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    HOME CARE SECTION-->

    <!--    HOME CARE SECTION-->
    <section class="home-care health-femily py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="clients-details">
                        <h3 class="mb-3 pb-3"> @lang('homepage.telemedicine') </h3>
                        <h4 class="mb-2 pb-2"> @lang('homepage.healthcareforfamily')</h4>


                        @lang('homepage.healthcareforfamilytext')



                        <div>
                            {{--  <a href="#" class="btn-grad"> @lang('homepage.seedetails')</a>  --}}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--    HOME CARE SECTION-->

    <!--    PROVITE SECTION-->
    <section class="provide-section py-5">
        <div class="container">
            <div class="provide-box">
                <div class="provide-title">
                    <h2 class="mb-2 pb-2">  @lang('homepage.medicaltourism') </h2>
                    <h2 class="mb-2 pb-4">@lang('homepage.provideforyourhealth')</h2>
                   
                </div>

                <div class="col-md-12">
                      
                 
                <ul class="list-unstyled nav flex-column">
                      
                        <li class="" >
                             <h4> @lang('homepage.certifieddoctors')   </h4> 
                           
                        </li> 

                         <li class="">
                           
                             <h4>  @lang('homepage.accommodation')  </h4> 
                           
                        </li>

                        <li class="">
                             
                              <h4>  @lang('homepage.price')   </h4> 
                          
                        </li> 

                         <li class="">
                           
                              <h4>  @lang('homepage.translator')  </h4> 
                          
                        </li> 


                         <li class="">
                            
                              <h4> @lang('homepage.appointmen')  </h4> 
                           
                        </li> 

                         <li class="">
                          
                             <h4> @lang('homepage.assurance') </h4> 
                           
                        </li>
                    
                    </ul>

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

    
@endsection
