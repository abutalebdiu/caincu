@extends('frontend.layouts.app')
@section('title', 'Contact')
@section('content')

    <section class="doctor-section py-5">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 col-lg-2">
                    <h4 class="text-capitalize">doctor List</h4>
                </div>
                <div class="col-12 col-lg-10">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="city_id" id="select_nice">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'City' : 'المدينة' }} --
                                        </option>

                                        @foreach ($cities as $city)

                                            <option @if (isset($city_id)) {{ $city_id == $city->id ? 'selected' : '' }} @endif value="{{ $city->id }}">
                                                {{ app()->getLocale() == 'en' ? $city->name : $city->name_ar }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="specility_id" id="select_nice2">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'Specialties' : 'التخصص' }}
                                            --</option>
                                        @foreach ($specilities as $specility)

                                            <option @if (isset($specility_id)) {{ $specility_id == $specility->id ? 'selected' : '' }} @endif value="{{ $specility->id }}">
                                                {{ app()->getLocale() == 'en' ? $specility->name : $specility->name_ar }}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="type_id" id="select_nice3">
                                        <option value="">-- {{ app()->getLocale() == 'en' ? 'Type' : 'النوع' }} --
                                        </option>

                                        @foreach ($typies as $type)

                                            <option @if (isset($type_id)) {{ $type_id == $type->id ? 'selected' : '' }} @endif value="{{ $type->id }}">
                                                {{ app()->getLocale() == 'en' ? $type->name : $type->ar_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="search-button">
                                    <button type="submit" class="btn-grad">
                                        <i class="fa fa-search"></i>
                                        @lang('homepage.search')</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                @forelse($searchdoctors as $doctor)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="doctors-box">
                            <form action="{{ route('doctor.appointment') }}" method="post">
                                @csrf
                                <div class="d-flex bd-highlight">
                                    <div class="doctor-photo flex-shrink-1 bd-highlight">


                                        <img src="{{ asset($doctor->doctor->image) }}" alt="" width="100%">



                                    </div>
                                    <div class="doctor-detals w-100 bd-highlight">
                                        <input type="hidden" value="{{ $doctor->id }}"
                                            name="doctor_organization_branche_id">
                                        <h5>{{ $doctor->doctor ? $doctor->doctor->name : '' }}</h5>
                                        <p>{{ $doctor->specialty ? $doctor->specialty->name : '' }}</p>


                                        <p>{{ $doctor->doctor ? $doctor->doctor->phone : '' }}</p>
                                        <p>{{ $doctor->city ? $doctor->city->name : '' }}</p>
                                        <span class="email">e-mail :
                                            {{ $doctor->doctor ? $doctor->doctor->email : '' }}</span>

                                    </div>

                                </div>
                                <div class="doctor-chamber">
                                    <span>chamber</span>
                                    <p>{{ $doctor->organizationBranch ? $doctor->organizationBranch->name : '' }}</p>
                                    <p>{{ $doctor->organizationBranch ? $doctor->organizationBranch->city->name : '' }}</p>
                                    <p>{{ $doctor->doctorSchedule ? $doctor->doctorSchedule->start_time : '' }} -
                                        {{ $doctor->doctorSchedule ? $doctor->doctorSchedule->end_time : '' }}</p>
                                    <button type="submit" class="btn-grad capital">appoint now</button>
                                    {{-- <a href="#" class="btn-grad capital d-details">details</a> --}}

                                </div>
                            </form>

                        </div>
                    </div>

                @empty

                    <div class="col-sm-12 col-md-12">
                        <div class="single-categorynews">
                            <h3>No Doctors Found</h3>
                        </div>
                    </div>

                @endforelse




            </div>
        </div>
    </section>

@endsection
