@extends('frontend.layouts.app')
@section('title','Login')
@section('content')
 

  


<!--    LOGIN SECTION-->
    <div class="login-section">
        <div class="container">
            <div class="login-box reg">
               <h2>@lang('page.login')  </h2>
               
                <form action="{{ route('customer.login') }}" method="post" method="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('page.email')">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                        
                        <div class="col-12">
                            <input type="password" name="password"  value="{{ old('password') }}" placeholder="@lang('page.password')">
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="col-12">
                            <div class="checkbox-left">
                                <span><input name="rememberme" type="checkbox">@lang('page.rememberme')</span>
                            </div>
                            
                        </div>
                        <div class="col-12">
                            <button  type="submit" class="btn-grad w-100">@lang('page.login')</button>
                        </div>
                        <div class="already-registation">
                            <span>@lang('page.donthavean')
                                <a href="{{ route('customer.registation') }}">@lang('page.registation')</a>
                            </span>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!--    LOGIN SECTION-->





@endsection