@extends('frontend.layouts.app')
@section('title', 'Contact')
@section('content')


    <section class="contact-section py-5">
        <div class="container">
            <div class="contact-section-box">
                <div class="row">
                    <div class="col-12 pb-4">
                        <div class="section-head ">
                            <h4 class="after-dot-auto margin-auto text-center">@lang('page.contactus')</h4>

                            <p class="pb-5">
                                @lang('page.wearealwayshappy')
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-section py-1">
                            <form action="{{route('contactStore')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-title py-3">
                                            <span>@lang('page.sendusamessage')</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <input name="name" type="text" class="form-control" id="name"
                                                placeholder="@lang('page.yourname')" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <input name="familyname" type="text" class="form-control" placeholder="@lang('page.familyname')">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <input name="phonenumber" type="text" class="form-control" id="number"
                                                placeholder="@lang('page.pnone')" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <input name="email" type="email" class="form-control" id="email"
                                                placeholder="@lang('page.email')">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <input name="city" type="text" class="form-control" id="email"
                                                placeholder="@lang('page.city')">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-12">
                                        <div class="mb-3">
                                            <textarea name="address" id="message" placeholder="@lang('page.address')"
                                                class="form-control textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 pb-4">
                                        <div class="mb-3 contact-btn">
                                            <button  class="btn-grad pull-right"> @lang('page.submit') <i class="fa fa-paper-plane-o"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 ">
                        <div class="contact-info">
                            <div class="contact-info-box">
                                <div class="info-box">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-shrink-1 bd-highlight icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="p-2 w-100 bd-highlight info-txt">
                                           @lang('homepage.contactsusaddress')
                                        </div>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-shrink-1 bd-highlight icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <div class="p-2 w-100 bd-highlight info-txt">
                                            info@caincu.com
                                        </div>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-shrink-1 bd-highlight icon">
                                            <i class="fa fa-volume-control-phone"></i>
                                        </div>
                                        <div class="p-2 w-100 bd-highlight info-txt">
                                           00966551175959
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="google-maps pb-5 bt-3">
                        <h4>@lang('page.ourlocation')</h4>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3626.5879796358595!2d46.710314614315166!3d24.637881760211407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f05a960574eb7%3A0xcbca2977ae2c36ed!2z2YXZg9iq2Kgg2LTYsdmD2Kkg2KfZhNix2YrYsyDYqNin2KjYsdin2Kwg2KfZhNiu2KfZhNiv2YrYqQ!5e0!3m2!1sbn!2sbd!4v1619780652875!5m2!1sbn!2sbd"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--    END CONTACT SECTION-->






@endsection
