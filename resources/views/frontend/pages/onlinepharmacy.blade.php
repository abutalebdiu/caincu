@extends('frontend.layouts.app')
@section('title', 'Online Pharmacy')
@push('css')
     <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/product_details.css">
@endpush
@section('content')


   
    <form action="{{route('online.pharmacy',$makeRoute)}}" method="GET">
    <!--CATEGORY PAGE-->
    <div class="category-page pb-5">
        <div class="container-flud">
            <div class="category-main d-flex bd-highlight">
                <div class="category-left flex-shrink-1 bd-highlight">
                    <div class="category-accordion">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button custom" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                        @lang('page.category')  
                                    </button>
                                </h2>
                                <div id="collapsetwo" class="accordion-collapse custom collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body custom">
                                        <div class="category-body">
                                            <ul class="first-ul">
                                                {{-- <li><a href="#">@lang('page.electronicsmobiles')</a> --}}
                                                    {{-- <ul>
                                                        <li><a href="#">@lang('page.mobilephone')</a> --}}
                                                            <ul>
                                                                @foreach ($categories as $category)
                                                                    <li>
                                                                        <a @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id ) style="color:#8050fb" @endif @endif href="{{route('online.pharmacy',$makeRoute . $category->id)}}"> 
                                                                            {{ app()->getLocale() == 'en' ? $category->name : $category->ar_name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    {{-- </ul> --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button custom" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsetree" aria-expanded="true" aria-controls="collapsetree">
                                        @lang('page.brand')
                                    </button>
                                </h2>
                                <div id="collapsetree" class="accordion-collapse custom collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body custom">
                                        <div class="brand-body">
                                            {{-- <div class="search-input">
                                                <input type="search" placeholder="Search" id="search">
                                            </div> --}}
                                            <div class="brand-cat-box">
                                                @foreach ($brands as $brand)
                                                    {{-- <a href="#"> --}}
                                                        <span>
                                                            <input name="brand_id" @if(isset($_GET['brand_id'])) {{$_GET['brand_id'] == $brand->id ? 'checked' : ''}} @endif value="{{$brand->id}}" type="checkbox" class="form-check-input" style="cursor:pointer;">
                                                        </span>
                                                        <span style="margin-right:5px;">{{ app()->getLocale() == 'en' ? $brand->en_name : $brand->ar_name }}</span>
                                                        {{-- <span class="right">(294)</span>
                                                    </a> --}}
                                                @endforeach
                                                {{-- <a href="#" class="see-style">@lang('page.seeall')</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button custom" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                        @lang('page.price')
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse custom collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body custom">
                                        <div class="price-body">
                                            <div class="price-form">
                                              
                                                    <span>
                                                        <input name="start_amount" type="number" step="any" @if(isset($_GET['start_amount'])) value="{{$_GET['start_amount']}}" @else value="20" @endif>
                                                    </span>
                                                    <span class="to">@lang('page.to')</span>
                                                    <span>
                                                        <input name="end_amount" type="number" step="any" @if(isset($_GET['end_amount'])) value="{{$_GET['end_amount']}}" @else value="200" @endif>
                                                    </span>
                                                    <span class="go-btn">
                                                        <button style="border:1px solid white;;background-color: #9d50bb;
                                                            color: white;
                                                            padding: 3px;
                                                            padding-left: 5px;
                                                            padding-right: 5px;"
                                                            > @lang('page.go') </button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button custom" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                        @lang('page.productratin')
                                    </button>
                                </h2>
                                <div id="collapsefive" class="accordion-collapse custom collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body custom">
                                        <div class="product-rating-body">
                                            <div class="product-rat">
                                                <span>@lang('page.starsormore')</span>
                                                <span class="rat-count">(660)</span>
                                            </div>
                                            <div class="star-range">
                                                <input type="range">
                                            </div>
                                            <div class="onetofive">
                                                <span>@lang('page.1_star')</span>
                                                <span class="star5">@lang('page.1_star')</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>
                <div class="category-right w-100 bd-highlight">

           


                    {{-- <div class="shop-brands">
                        <span class="d-block d-sm-none" id="sort">
                            <i class="fa fa-bars"></i>
                        </span>
                        <h5>@lang('page.Shopbybrand')</h5>
                    </div>
                    <div class="shop-brands-img" style="width:94%; margin: auto;">
                        <div class="row">

                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>


                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                <a href="#">
                                    <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="brand name">
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <!--    CONSULTANCY SECTION-->
                    <div class="service-section py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <h4 class="text-capitalize">@lang('page.medicinelist')</h4>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="search-medicine d-flex bd-highlight">
                                        <span class="msearch w-100 bd-highlight">
                                            <input type="search" name="product_id" placeholder="@lang('page.searchmedicine')" >
                                        </span>
                                        <span class="mbtn flex-shrink-1 bd-highlight">
                                            <button  class="btn-grad" style="padding-top: 8px;padding-bottom: 8px">
                                                <i class="fa fa-search"></i>
                                                @lang('page.search')</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-3">

                                @foreach ($products as $product)
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                                        <div class="madicin-box">
                                            <div class="hot-deals-box cat clearfix">
                                                <div class="sub-hot-deals-box clearfix">
                                                    <div class="hot-deals-img">

                                                        @if(Storage::disk('public')->exists('images/products/',$product->default_image))
                                                            <img src="{{ asset('storage/images/products/'.$product->default_image) }}" alt="Product-photo" >
                                                        @endif
                                                            {{--   <img src="{{ asset($product->default_image) }}"
                                                            alt="product-photo"> --}}
                                                    </div>
                                                    <div class="hot-deals-details">
                                                        <div class="hot-deals-name">
                                                            <span>
                                                                @if (app()->getLocale() == 'en')
                                                                    {{ $product->unit ? $product->unit->name : '' }}
                                                                    @else
                                                                    {{ $product->unit ? $product->unit->ar_name : '' }}
                                                                @endif
                                                            </span>
                                                            <p>
                                                                @if (app()->getLocale() == 'en')
                                                                    {{ $product->title }}
                                                                    @else
                                                                    {{ $product->ar_title }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <h6 class="price">Price {{ $product->price }}</h6>
                                                        <p class="discount">
                                                            <del> </del>
                                                            <span></span>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <div class="card-left">
                                                            <a data-id="{{$product->id}}" href="#" class="addToCart btn-grad small">@lang('page.addcard')</a>
                                                        </div>
                                                        <div class="card-right">
                                                            <a data-id="{{$product->id}}" href="#" class="product_details btn-grad small">@lang('page.details')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            {{$products->links()}}


                        </div>
                    </div>
                    <!--  END CONSULTANCY SECTION-->



                </div>

            </div>
        </div>
    </div>
    <!--END CATEGORY PAGE-->
      </form>



    <div class="modal" id="productDetailModal"></div>

    <input type="hidden" class="productDetails" value="{{route('productDetails')}}" />
    <input type="hidden" class="urlAddToCart" value="{{route('addToCart')}}" />
    <input type="hidden" class="urlExistSaleCart" value="{{route('existSaleCart')}}" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        /*product details*/
        $(document).on('click','.product_details',function(e){
            e.preventDefault();
            var url = $('.productDetails').val();
            var product_id = $(this).data('id');
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                 data:{
                    product_id:product_id
                },
                success:function(result){
                    if(result.success)
                    {
                        $('#productDetailModal').html(result.data).modal('show');
                    }
                },
            });
        }); 
        $(document).on('click','.hideModal',function(e){
            $('#productDetailModal').html('').modal('hide');
        });
        /*product details*/


        $(document).on('click','.addToCart',function(e){
            e.preventDefault();
            var product_id = $(this).data('id');
            var url = $('.urlAddToCart').val();
            $.ajax({
                url:url,
                type:'GET',
                datatype:'html',
                data:{
                    product_id:product_id
                },
                success:function(result){
                    if(result.success)
                    {   
                        $('#productDetailModal').html('').modal('hide');
                        toastr.success("{{ Session::get('message','Item is added successfully in cart') }}");
                        $('.showCartResult').html(result.html);
                    }
                },
            });
        });

        /*
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
                    }
                },
            });
        }); */

    </script>
@endsection


