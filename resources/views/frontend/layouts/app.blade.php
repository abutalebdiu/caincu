@php
$url    = Request::url();
$parts = explode(app()->getLocale(), $url, 2);

@endphp

@php
    $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];
@endphp

<!DOCTYPE html>

@if (app()->getLocale() == 'en')
    <html lang="en" dir="auto">
@elseif(app()->getLocale() == "ar")
    <html lang="ar" dir="rtl">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Careincu</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <link rel="icon"
        href="{{ asset('public/frontend') }}/{{ asset('public/frontend') }}/images/logo/invest-favicon.PNG"
        type="image/gif" sizes="16x16">
    <!--    BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--    NICE SELECT-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" />

    <!--    GOOGLE FONT-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,800;1,700&amp;family=Roboto:wght@500;700;900&amp;display=swap"
        rel="stylesheet">
    <!--    FONT AWSOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />

    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick.css">
    <!--    MAIN STYLE-->

    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/responsive.css">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/arbi.css">
    @endif

    @stack('css')

    <style>
    .dropbtn {
        background-color: #9f81ec;
        color: #fff;
        padding: 4px;
        font-size: 13px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1111111111111;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #8050fb;
        }
    </style>

</head>

<body>

    <!--    LANGUAGE-->
    {{-- <div class="lan-btn">
        @if (app()->getLocale() == 'en')
            <a href="{{ $parts[0] . 'ar' . $parts[1] }}"> <span>Arabic <img src="https://jobincu.com/frontend/logo/ar.png"
                        alt=""> </span></a>
        @else
            <a href="{{ $parts[0] . 'en' . $parts[1] }}"> <span>English <img
                        src="https://jobincu.com/frontend/logo/en_US.png" alt=""> </span></a>
        @endif
    </div> --}}
    <!-- END LANGUAGE-->

    <!-- PROLODER & SCROLL-UP -->
    <div id="pre-loader" style="display: none;"> <img src="{{ asset('public/frontend') }}/images/icon/rign.svg"
            alt=""></div>
    <a id="button" class="show"></a>
    <!-- END PROLODER & SCROLL-UP -->



   {{--  @if(count($cartName) > 0) --}}
    <!-- CARD OVER-->
    <div class="cart-over" id="small-cart">
        <a href="#" class="viewSaleCart">
            <span class="cart-over-num">@lang('salecart.yourcart')</span>
            <span class="cart-over-logo">
                <i class="fa fa-cart-arrow-down"></i>
            </span>
            <span class="cart-over-blance">@lang('salecart.view')</span>
        </a>
    </div>
    <div class="cart-over-cart" id="cart-over-cart">
        <div class="cart-over-head clearfix">
            <span class="bag">
                <i class="fa fa-shopping-bag"></i>
                @lang('salecart.yourselecteditem')
            </span>
            <span class="cart-cross">
                <i class="fa fa-times" id="remove-large-cart"></i>
            </span>
        </div>

       <!----item------>
           <div class="showCartResult"></div>
       <!----item------>

    </div>


    <!--    CARD OVER-->
   {{--  @endif --}}





    <!--    HEADER TOP-->
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="hp-left clearfix">
                    <div style="display: inline-block;margin-right:10px;">
                        <i class="fa fa-volume-control-phone"></i>
                        00966551175959
                    </div>
                    <div style="display: inline-block;margin-right:10px;">
                        <i class="fa fa-envelope-o"></i>
                        info@careincu.com
                    </div>

                     <div style="display: inline-block;margin-right:10px;">
                          @if (app()->getLocale() == 'en')
                             <a @if(app()->getLocale() == 'ar') style="color: #8050fb; background-color: #d2c9ea;" @endif href="{{ $parts[0] . 'ar' . $parts[1] }}"><img src="{{ asset('public/images/sa-ar.png') }}" alt="" width="18px"> Arabic @if(app()->getLocale() == 'ar') <i class="fa fa-check" aria-hidden="true" style="color: var(--wc); background-color: #8050fb;"></i> @endif</a>
                          @else

                             <a @if(app()->getLocale() == 'en') style="color: #8050fb; background-color: #d2c9ea;" @endif href="{{ $parts[0] . 'en' . $parts[1] }}"><img src="{{ asset('public/images/usa-en.png') }}" alt="" width="20px"> English @if(app()->getLocale() == 'en') <i class="fa fa-check" aria-hidden="true" style="color: var(--wc); background-color: #8050fb;"></i> @endif</a>

                          @endif
                    </div>

                </div>
                <div class="hp-right clearfix">


                   {{-- @guest

                    @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>


                    @endguest--}}

                    @if (Auth::check())
                        <span class="hp-auth">
                           @if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3)
                            <a href="{{ route('home') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==4)
                            <a href="{{ route('doctor-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==5)
                            <a href="{{ route('medicalcenter-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==6)
                            <a href="{{ route('hospital-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==7)
                            <a href="{{ route('pharmacy-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==8)
                            <a href="{{ route('gym-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==9)
                            <a href="{{ route('beautycare-dashboard') }}" class="btn-grad"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                            
                            @elseif(Auth::user()->role_id==10)
                            <a href="{{ route('customer.dashboard') }}" class="btn-grad"><i class="fa fa-dashboard"
                                    aria-hidden="true"></i> Dashboard</a>
                            <a href="{{ route('customer.logout') }}" class="btn-grad"> <i class="fa fa-sign-out"></i>
                                logout
                            </a>
                            @else
                    <a href="{{ route('login') }}" class="btn-grad"><i class="fa fa-dashboard"
                                                                                                  aria-hidden="true"></i> Login</a>
                            @endif
                        </span>
                    @else
                        <span class="hp-auth">
                            
                            <a href="{{ route('customer.login') }}" class="btn-grad"> <i class="fa fa-sign-in"></i>
                                @lang('page.login')
                            </a>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--   END HEADER TOP-->



    <!--    HEADER SECTION-->
    <header class="header-section">
        <div class="container">
            <div class="head-content">
                <div class="row">
                    <div class="col-12 col-xl-2">
                        <div class="main-logo">
                            <a href={{ route('frontend') }}>
                                <img src="{{ asset($websetting->logo) }}" alt="logo">
                            </a>
                            <span class="mobile-btn d-block d-xl-none" id="mobile-btn">
                                <i id="mobile-click" class="fa fa-bars"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-10 d-none d-xl-block">
                        <div class="menubar">
                            <ul>
                                <li><a href="{{ route('frontend') }}" @if(Request::routeIs('frontend')) style="color: var(--wc); background-color: #8050fb;" @endif > @lang('homepage.home') </a></li>
                                <li><a href="{{ route('about') }}" @if(Request::routeIs('about')) style="color: var(--wc); background-color: #8050fb;" @endif > @lang('homepage.aboutus') </a></li>
                                <li><a href="{{ route('online.pharmacy') }}" @if(Request::routeIs('online.pharmacy')) style="color: var(--wc); background-color: #8050fb;" @endif > @lang('homepage.onlinepharmachy') </a>
                                </li>
                                <li><a href="{{ route('home.care') }}"  @if(Request::routeIs('home.care')) style="color: var(--wc); background-color: #8050fb;" @endif > @lang('homepage.homecare') </a> </li>
                                <li><a href="{{ route('telemedicine') }}"  @if(Request::routeIs('telemedicine')) style="color: var(--wc); background-color: #8050fb;" @endif >@lang('homepage.telemedicine')</a></li>
                                <li><a href="{{ route('medicaltourism') }}"  @if(Request::routeIs('medicaltourism')) style="color: var(--wc); background-color: #8050fb;" @endif >@lang('homepage.medicaltourism')</a></li>
                                <li><a href="{{ route('contact') }}"  @if(Request::routeIs('contact')) style="color: var(--wc); background-color: #8050fb;" @endif > @lang('homepage.contactus')</a></li>
                                <li class="sub-btn"><a href="#"> @lang('registation.registation')
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="sub-menu">
                                        <ul>
                                            <li><a href="{{ route('customer.registation') }}"> @lang('registation.userregistation')</a></li>
                                            <li><a href="{{route('doctor.registation')}}">@lang('registation.doctorregistation')</a></li>
                                            <li><a href="{{route('hospital.registation')}}">@lang('registation.hospitalregistation')</a></li>
                                            <li><a href="{{route('medical.registation')}}">@lang('registation.medicalregistation')</a></li>
                                            <li><a href="{{route('farmacy.registation')}}">@lang('registation.farmacyregistation')</a></li>
                                            <li><a href="{{route('gym.registation')}}">@lang('registation.gym')</a></li>
                                            <li><a href="{{route('beauty.center.registation')}}">@lang('registation.beautycenter')</a></li>
                                            
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!--        MOBILE MENU-->
    <div id="mobile-menu" class="mobile-menu">
        <!-- accordion-->
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="mobile-logo">
                <a href="{{ route('frontend') }}">
                    <img src="{{ asset('public/frontend') }}/images/logo/logo.png" alt="mobile-logo">
                </a>
                <i id="mobile-cross" class="fa fa-times"></i>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('frontend') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-home"></i> @lang('homepage.home')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <a href="{{ route('about') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-server"></i>
                            @lang('homepage.aboutus')
                        </button></a>
                </h2>

            </div>
        
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('online.pharmacy') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-address-book-o"></i> @lang('homepage.onlinepharmachy')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('home.care') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-life-ring"></i> @lang('homepage.homecare')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('telemedicine') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-bullseye"></i>@lang('homepage.telemedicine')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('medicaltourism') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-address-book"></i> @lang('homepage.medicaltourism')
                        </button>
                    </a>
                </h2>
            </div>

            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('contact') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            <i class="fa fa-address-card-o"></i> @lang('homepage.contactus')
                        </button>
                    </a>
                </h2>
            </div>

            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fa fa-server"></i>
                         @lang('registation.registation')
                    </button>
                </h2>
                <div id="two" class="accordion-collapse collapse" aria-labelledby="two" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body custom">
                        <ul>
                            <li><a href="{{ route('customer.registation') }}"> @lang('registation.userregistation')</a></li>
                            <li><a href="{{route('doctor.registation')}}">@lang('registation.doctorregistation')</a></li>
                            <li><a href="{{route('hospital.registation')}}">@lang('registation.hospitalregistation')</a></li>
                            <li><a href="{{route('medical.registation')}}">@lang('registation.medicalregistation')</a></li>                                <li><a href="{{route('farmacy.registation')}}">@lang('registation.farmacyregistation')</a></li>
                            <li><a href="{{route('gym.registation')}}">@lang('registation.gym')</a></li>
                            <li><a href="{{route('beauty.center.registation')}}">@lang('registation.beautycenter')</a></li>
                            <li><a href="{{route('customer.login')}}">@lang('page.login')</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!--   END MOBILE MENU-->



    @yield('content')




    <!--    FOOTER SECTION-->
    <footer class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <div class="footer-head pb-2">


                        </div>
                        <div class="footer-content">
                            <a href="#">
                                <img src="{{ asset($websetting->logo) }}" alt="logo">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <div class="footer-head pb-2">
                            <h5>@lang('homepage.menubar')</h5>
                            <div class="dot-div footer">
                                <span class="dot first-dot"></span>
                                <span class="dot second-dot"></span>
                                <span class="dot third-dot"></span>
                            </div>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="{{ route('frontend') }}"> @lang('homepage.home') </a></li>
                                <li><a href="{{ route('about') }}"> @lang('homepage.aboutus') </a></li>
                                <li><a href="{{ route('online.pharmacy') }}"> @lang('homepage.onlinepharmachy') </a></li>
                                <li><a href="{{ route('home.care') }}"> @lang('homepage.homecare') </a> </li>
                                <li><a href="{{ route('telemedicine') }}">@lang('homepage.telemedicine')</a></li>
                                <li><a href="{{ route('medicaltourism') }}">@lang('homepage.medicaltourism')</a></li>
                                <li><a href="{{ route('contact') }}"> @lang('homepage.contactus')</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <div class="footer-head pb-2">
                            <h5>@lang('homepage.contactsus')</h5>
                            <div class="dot-div footer">
                                <span class="dot first-dot"></span>
                                <span class="dot second-dot"></span>
                                <span class="dot third-dot"></span>
                            </div>
                        </div>
                        <div class="footer-content">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="p-2 w-100 bd-highlight">
                                    <p> @lang('homepage.contactsusaddress')</p>
                                </div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="p-2 w-100 bd-highlight">
                                    <p>@lang('page.phone') : {{ "00966551175959" }}</p>
                                </div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <i class="fa fa-envelope-o"></i>

                                </div>
                                <div class="p-2 w-100 bd-highlight">
                                    <p>@lang('page.email') : info@careincu.com</p>
                                </div>
                            </div>
                            <div class="social-footer">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   END FOOTER SECTION-->

    <!--    COPYRIGHT SECTION-->
    <section class="copyright-section py-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center"> Copyright © Care Incubators. All Right Reserved </h6>
                </div>
            </div>
        </div>
    </section>
    <!--    COPYRIGHT SECTION-->






    <!--    JQUERY-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--    BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/frontend') }}/js/main.js"></script>
    <script src="{{ asset('public/frontend') }}/js/slick.min.js"></script>
    <!--    NICE SELECT2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <input type="hidden" class="urlExistSaleCart" value="{{route('existSaleCart')}}" />
  <input type="hidden" class="removeSingleItemFromSaleCart" value="{{route('removeSingleItemFromSaleCart')}}" />
  <input type="hidden" class="removeAllItemFromSaleCart" value="{{route('removeAllItemFromSaleCart')}}" />
  <input type="hidden" class="updateSaleCart" value="{{route('updateSaleCart')}}" />
    <script>
        $(document).ready(function(){
            var url = $('.urlExistSaleCart').val();
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                success:function(result){
                    if(result.success)
                    {
                        $('.showCartResult').html(result.data);
                        totalAmount();
                    }
                },
            });
        });

        $(document).on('click','.viewSaleCart',function(){
            var url = $('.urlExistSaleCart').val();
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                success:function(result){
                    if(result.success)
                    {
                        $('.showCartResult').html(result.data);
                        totalAmount();
                    }
                },
            });
        });


        $(document).on('click','.removeSingleItemFromCart',function(){
            var url = $('.removeSingleItemFromSaleCart').val();
            var product_id = $(this).data('id');
            $.ajax({
                url:url,
                type:'GET',
                  data:{
                    product_id:product_id
                },
                datatype:'html',
                success:function(result){
                    if(result.success)
                    {
                        $('.showCartResult').html(result.data);
                        totalAmount();
                    }
                },
            });
        });

        $(document).on('click','.removeEmptyAllItemFromSaleCart',function(){
            var url = $('.removeAllItemFromSaleCart').val();
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                success:function(result){
                    if(result.success)
                    {
                        $('.showCartResult').html(result.data);
                        totalAmount();
                    }
                },
            });
        });



        $(document).on('change keyup','.keyup_change_quantity',function(){
            var item_id     = $(this).data('id');
            var item_price  = $('#item_price_id_'+ item_id).val();
            var quantity    = $(this).val();
            var sub_total   =  quantity * item_price ;
            $('#sub_total_amount_id_'+item_id).text(sub_total);
            $('#sub_total_amount_hidden_id_'+item_id).val(sub_total);
            totalAmount();
        });


        /*update cart*/
        $(document).on('change keyup','.keyup_change_quantity',function(){
            var product_id      = $(this).data('id');
            var quantity        = $(this).val();
            var url = $('.updateSaleCart').val();
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                 data:{
                    product_id:product_id,quantity:quantity
                },
                success:function(result){
                    if(result.success)
                    {
                        $('.showCartResult').html(result.data);
                        totalAmount();
                    }
                },
            });
        });
        /*update cart*/


        $(document).ready(function(){
           totalAmount();
        });

        function totalAmount()
        {
            var sum = 0;
            $('.subTotalAmount').each(function() {
                sum += Number($(this).val());
            });
            $('.total_amount').text(sum);
            $('.total_amount_value').val(sum);
        }
    </script>


    <script>
        @if (Session::has('message'))

            var type = "{{ Session::get('alert-type', 'info') }}"

            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }

        @endif

        $('#select_nice').select2();
        $('#select_nice2').select2();
        $('#select_nice3').select2();
        $('#select_nice4').select2();

        $(document).ready(function() {
            $('#small-cart').click(function() {
                $('#cart-over-cart').addClass('show_cart_large')
            })
            $('#remove-large-cart').click(function() {
                $('#cart-over-cart').removeClass('show_cart_large')
            })
        })

    </script>


</body>

</html>
