<!--MOBILE USER DASHBOARD-->
<section class="mobile-user-dashboard">
    <div class="mud-logo">
        <img src="images/logo/logo.png" alt="logo">
        <span class="mud-close">
            <i class="fa fa-times" id="mud-close-btn"></i>
        </span>
        <h6>{{ Auth::user()->name }}</h6>
        <div>

            <a href="{{ route('customer.logout') }}">
                <i class="fa fa-sign-out"></i>
                @lang('customerdashboard.signout')
            </a>
        </div>
    </div>

    <div class="dashboard-item py-3">

        <ul>
            <li>
                <a href="{{ route('customer.telemedicine') }}">
                    <i class="fa fa-building-o"></i>
                    @lang('customerdashboard.telemedicinerequest')
                </a>
            </li>

            <li class="desh-active">
                <a href="{{ route('customer.medicial.tourism') }}">
                    <i class="fa fa-building-o"></i>
                    @lang('customerdashboard.medicialtourismrequest')
                </a>
            </li>

            <li class="">
                <a href="{{ route('homecare.service.request') }}">
                    <i class="fa fa-building-o"></i>
                    @lang('customerdashboard.homecarerequest')
                </a>
            </li>
            <li>
                <a href="{{ route('customer.doctor.appointment') }}">
                    <i class="fa fa-money"></i>
                    @lang('customerdashboard.appointmentlist')
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('customer.doctor.appointment') }}">
                    <i class="fa fa-shopping-cart"></i>
                    @lang('customerdashboard.medicine')
                </a>
            </li> --}}

            <li>
                <a href="{{ route('customer.setting') }}">
                    <i class="fa fa-cog"></i>
                     @lang('customerdashboard.setting')
                </a>
            </li>

            <li>
                <a href="{{ route('customer.profile') }}">
                    <i class="fa fa-user"></i>
                   @lang('customerdashboard.profile')
                </a>
            </li>

            <li>
                <a href="{{ route('customer.logout') }}" title=""><i class="fa fa-sign-out"></i> @lang('customerdashboard.logout')</a>
            </li>


        </ul>






    </div>
</section>
<!--MOBILE USER DASHBOARD-->
