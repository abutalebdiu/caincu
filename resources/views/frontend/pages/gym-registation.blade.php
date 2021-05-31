
@extends('frontend.layouts.app')
@section('title','Gym Registation')
@section('content')

    <section class="registation-section py-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h4 class="after-dot-auto">@lang('registation.gymRegistation')</h4>
                    </div>
                </div>
            </div>
            <div class="registation-form pt-5">
                <form action="{{route('gym.registation.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="name">@lang('registation.gymname')<span>*</span></label>
                                <input type="text" name="name_en" value="{{old('name_en')}}" class="custom-form" id="name" placeholder="@lang('registation.gymname')">
                                <div class="text-danger error text-capitalize">{{$errors->first('name_en')}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="name_ar">@lang('registation.gymnameababic') <span>*</span></label>
                                <input type="text" name="name_ar" value="{{old('name_ar')}}" class="custom-form" id="name_ar" placeholder="@lang('registation.gymnameababic')">
                                <div class="text-danger error text-capitalize">{{$errors->first('name_ar')}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="owner">@lang('registation.gymownername') <span>*</span></label>
                                <input type="text" name="owner" value="{{old('owner')}}" class="custom-form" id="name" placeholder="@lang('registation.gymownername')">
                                <div class="text-danger error text-capitalize">{{$errors->first('owner')}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="mobile">@lang('registation.mobilenumber')  <span>*</span></label>
                                <input type="text" name="mobile" value="{{old('mobile')}}" class="custom-form" id="name" placeholder="@lang('registation.mobilenumber') ">
                                <div class="text-danger error text-capitalize">{{$errors->first('mobile')}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="email">@lang('registation.email')  <span>*</span></label>
                                <input type="email" name="email" value="{{old('email')}}" class="custom-form" id="eamil" placeholder="@lang('registation.email') ">
                                <div class="text-danger error text-capitalize">{{$errors->first('email')}}</div>
                            </div>
                        </div>
            
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="address">@lang('registation.gymaddress') <span>*</span></label>
                                <textarea name="address" class="custom-form"  placeholder="@lang('registation.gymaddress')
                                ">{{old('address')}}</textarea>
                                <div class="text-danger error text-capitalize">{{$errors->first('address')}}</div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="passowrd">@lang('registation.password')<span>*</span></label>
                                <input type="password" name="password" value="" class="custom-form" id="password" placeholder="@lang('registation.password')">
                                <div class="text-danger error text-capitalize">{{$errors->first('password')}}</div>
                            </div>
                        </div>   
                        <div class="text-center pt-3">
                            <button type="submit" class="btn-custom">@lang('registation.submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



@endsection
