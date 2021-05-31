@extends('frontend.layouts.app')
@section('title', 'Send Request')
@section('content')


    <!--    TELA MEDICINE DISCRIPT-->
    <section class="tele-medicine py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="tele-medicine-box">
                        <h2>@lang('homepage.medicaltourism')</h2>
                        <div class="dot-div mb-4">
                            <span class="dot first-dot"></span>
                        </div>
                        <div class="tele-dedicine-details">

                            <form action="{{ route('medicaltourism.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group pb-3">
                                    <label for="">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="select_nice" class="form-control">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'Category' : 'المدينة' }} --
                                        </option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ app()->getLocale() == 'en' ? $category->name : $category->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                </div>


                                <div class="form-group pb-3">
                                    <label for="">Service <span class="text-danger">*</span></label>
                                    <select name="service_id" id="select_nice" class="form-control">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'Service' : 'المدينة' }} --
                                        </option>
                                        @foreach ($services as $service)
                                            <option {{ old('service_id') == $service->id ? 'selected' : '' }}
                                                value="{{ $service->id }}">
                                                {{ app()->getLocale() == 'en' ? $service->name : $service->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('service_id') }}</div>
                                </div>





                                <div class="form-group pb-3">
                                    <label for=""> @lang('page.yourname') <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"  class="form-control" placeholder="@lang('page.yourname')">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                </div>
                                <div class="form-group pb-3">
                                    <label for=""> @lang('page.familyname')  <span class="text-danger">*</span></label>
                                    <input type="text" name="familyname" value="{{ old('familyname') }}"  class="form-control" placeholder=" @lang('page.familyname') ">
                                    <div class="text-danger">{{ $errors->first('familyname') }}</div>
                                </div>

                                <div class="form-group pb-3">
                                    <label for=""> @lang('page.phone')  <span class="text-danger">*</span></label>
                                    <input type="text" name="phonenumber" value="{{ old('phonenumber') }}"  class="form-control" placeholder=" @lang('page.phone') ">
                                    <div class="text-danger">{{ $errors->first('phonenumber') }}</div>
                                </div>

                                <div class="form-group pb-3">
                                    <label for=""> @lang('page.email')  <span class="text-danger">*</span></label>
                                    <input type="email" name="email"  value="{{ old('email') }}"  class="form-control" placeholder=" @lang('page.email') ">
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                                        
                                       


                                <div class="form-group pb-3">
                                    <label for="">Country <span class="text-danger">*</span></label>
                                    <select name="country_id" id="select_nice" class="form-control">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'Country' : 'المدينة' }} --
                                        </option>
                                        @foreach ($countries as $country)
                                            <option {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">
                                                {{ app()->getLocale() == 'en' ? $country->name : $country->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('city_id') }}</div>
                                </div>
                                <div class="form-group pb-3">
                                      <label for=""> @lang('page.requiredservice') <span class="text-danger">*</span></label>
                                      <textarea name="service" class="form-control" placeholder="@lang('page.requiredservice')">{{ old('service') }}</textarea>
                                      <div class="text-danger">{{ $errors->first('service') }}</div>
                                </div> 

                                <div class="form-group pb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('homepage.sendrequestbuton')</button>
                                </div>


                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   END TELA MEDICINE DISCRIPT-->

    




@endsection
