@extends('frontend.layouts.app')
@section('title', 'Customer Registration')
@section('content')

    <!--    REGISTRATION SECTION-->
    <div class="login-section">
        <div class="container">
            <div class="login-box">
                <h2>@lang('page.registation')</h2>
                <p>@lang('page.createyouraccount')</p>


                <form action="{{ route('customer.registation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="@lang('page.fullname')">
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input type="text" name="mobile" value="{{ old('mobile') }}" class="input-form-style"
                                placeholder="@lang('page.mobilenumber')">
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('page.email')">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <select name="city_id" id="" class="form-control">
                                <option value=""> @lang('page.city')</option>
                                @foreach ($cities as $city)
                                    <option {{ old('city_id') == $city->id ? 'selected' : '' }}
                                        value="{{ $city->id }}">
                                        {{ app()->getLocale() == 'en' ? $city->name : $city->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input type="password" name="password" value="{{ old('password') }}"
                                placeholder="@lang('page.password')">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input type="password" value="{{ old('confirm_password') }}" name="confirm_password"
                                placeholder="@lang('page.confirm_password')">
                            <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                        </div>
                        <div class="col-12 mt-2">
                            <textarea name="address"
                                placeholder="@lang('page.youraddress')">{{ old('address') }}</textarea>
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn-grad w-100"> @lang('page.registernow')</button>
                        </div>
                        <div class="already-registation">
                            <span>@lang('page.alreadyhaveanaccount')
                                <a href="{{ route('customer.login') }}">@lang('page.login')</a>
                            </span>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--    REGISTRATION SECTION-->








@endsection
