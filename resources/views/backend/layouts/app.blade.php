
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Caincu </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('public/backend') }}/assets/css/default/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/plugins/tag-it/css/jquery.tagit.css">

</head>

<body>
    <div id="page-loader" class="fade show"> <span class="spinner"></span> </div>
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        <div id="header" class="header navbar-default">
            <div class="navbar-header">
                <a href="{{ route('home') }}" class="navbar-brand"><span class="navbar-logo"></span> <b>Caincu</b> Admin</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="navbar-form">
                    <form action="#" method="POST" name="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image)

                        <img src="{{ asset(Auth::user()->image) }}" alt="">

                        @else

                        <img src="{{ asset('public/manpowers/user.png') }}" alt="" />
                        @endif
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('user.profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                        <a href="{{ route('user.setting') }}" class="dropdown-item"><i class="fa fa-cogs"></i> Setting</a>


                        <a class="dropdown-item" href="{{ route('profile.logout') }}">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>


                    </div>
                </li>
            </ul>
        </div>
        <div id="sidebar" class="sidebar">
            <div data-scrollbar="true" data-height="100%">
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;">
                            <div class="cover with-shadow"></div>
                            <div class="image">

                                @if(Auth::user()->image)

                                <img src="{{ asset(Auth::user()->image) }}" alt="">

                                @else

                                <img src="{{ asset('public/manpowers/user.png') }}" alt="" />
                                @endif
                            </div>
                            <div class="info"> {{ Auth::user()->name }} <small>Admistration</small> </div>
                        </a>
                    </li>

                </ul>
                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li>
                        <a href="{{route('user.index')}}"> <i class="fa fa-th-large"></i> <span>Dashboard</span> </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Applications </span>
                        </a>
                        <ul class="sub-menu">

                            <li><a href="{{route('application.doctor')}}"> Doctor<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('application.hospital')}}"> Hospital<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('application.medical-center')}}"> medical centr<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('application.pharmacy')}}"> Pharmacy<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('application.gym')}}"> Gym<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('application.beauty.center')}}"> Beauty Center<i class="fa fa-list text-theme"></i></a></li>


                        </ul>
                    </li>


                    <li class="nav-header">Service</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>All Request Services
                        </a>
                        <ul class="sub-menu">

                            <li><a href="{{route('service.homecare')}}"> Home Care Request<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('service.telemedicine')}}"> Tele Medicine Request<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('service.medicialtourism')}}"> Tourism Request<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('service.appointment')}}"> Appointment List<i class="fa fa-list text-theme"></i></a></li>


                        </ul>
                    </li>



                    <li class="nav-header">Products</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Product & Others
                        </a>
                        <ul class="sub-menu">

                            <li><a href="{{route('product.index')}}"> Product List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('product.create')}}"> Product Create<i class="fa fa-list text-theme"></i></a></li>


                            <li><a href="{{route('category.index')}}"> Product Categories List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('category.create')}}"> Add Product Category<i class="fa fa-plus text-theme"></i></a></li>

                            <li><a href="{{route('categorysub.index')}}"> Product Sub Categories List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('categorysub.create')}}"> Add Product Sub Category<i class="fa fa-plus text-theme"></i></a></li>


                            <li><a href="{{route('brand.index')}}"> Product Brands<i class="fa fa-plus text-theme"></i></a></li>
                            <li><a href="{{route('brand.create')}}"> Product Brands Add<i class="fa fa-plus text-theme"></i></a></li>

                            <li><a href="{{route('unit.index')}}"> Product Unit<i class="fa fa-plus text-theme"></i></a></li>
                            <li><a href="{{route('unit.create')}}"> Product Unit Add<i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>

                    <li class="nav-header">Online Pharmacy Order</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Pharmacy Order
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('order.index')}}"> Order List<i class="fa fa-list text-theme"></i></a></li>
                        </ul>
                    </li>


                    <li class="nav-header">Organization</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Organization
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('org.index')}}"> Organization List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('org.create')}}"> Add Organization <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>



                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Organizations Type
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('org_type.index')}}"> Organization Type List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('org_type.create')}}"> Add  Organizations Type<i class="fa fa-plus text-theme"></i></a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Branches
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('org_branch.index')}}">  Branch List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('org_branch.create')}}"> Add Branches <i class="fa fa-plus text-theme"></i></a></li>

                        </ul>
                    </li>



                    <li class="nav-header">Countries</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Countries
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('country.index')}}"> Country List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('country.create')}}"> Add Countries <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Capitals
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('capital.index')}}"> Capital List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('capital.create')}}"> Add Capitals <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span> Cities
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('city.index')}}"> City List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('city.create')}}"> Add Cities <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>



                    <li class="nav-header">Doctor</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Specialties
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('specialty.index')}}"> Specialties List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('specialty.create')}}"> Add Specialties <i class="fa fa-plus text-theme"></i></a></li>

                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Type
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('type.index')}}"> Typies List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('type.create')}}"> Add Type <i class="fa fa-plus text-theme"></i></a></li>

                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Doctor
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('doctor.index')}}"> Doctor List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('doctor.create')}}"> Add Doctor <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>


                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Doctor Schedules
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('doctor_schedule.index')}}"> Schedules List <i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{ route('doctor_schedule.create') }}">Add Schedule <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Schedules
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('organization.doctor.schedule.index')}}"> Schedules List <i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{ route('organization.doctor.schedule.create') }}">Add Schedule <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>




                    <li class="nav-header">Medical Tourism</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Categorys
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('medical_tourism_catagory.index')}}"> Category List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('medical_tourism_catagory.create')}}"> Add Categorys <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Services
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('medical_tourism_service.index')}}"> services List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('medical_tourism_service.create')}}"> Add Services <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>



                    <li class="nav-header">Home Care</li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Categorys
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('home_cat.index')}}"> Category List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('home_cat.create')}}"> Add Categorys <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-list-ol"></i> <span>Services
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('home_care_service.index')}}"> services List<i class="fa fa-list text-theme"></i></a></li>
                            <li><a href="{{route('home_care_service.create')}}"> Add Services <i class="fa fa-plus text-theme"></i></a></li>
                        </ul>
                    </li>






                <li class="nav-header">Users</li>
                <li class="has-sub">
                    <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-users"></i> <span>Users </span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('user.create') }}"> Add User <i class="fa fa-plus text-theme"></i></a></li>
                        <li><a href="{{ route('user.index') }}"> Users list <i class="fa fa-list text-theme"></i> </a></li>
                    </ul>
                </li>


                <li class="nav-header">Contract Request</li>
                <li class="has-sub">
                    <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-users"></i> <span>Contract Request</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('contract.index') }}"> Contract Request list <i class="fa fa-list text-theme"></i> </a></li>
                    </ul>
                </li>



                <li class="nav-header">Settings</li>

                <li class="has-sub">
                    <a href="javascript:;"> <b class="caret"></b> <i class="fa fa-cogs"></i> <span>Web Settings </span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('social.index') }}"> Social Media <i class="fa fa-share"></i> </a></li>
                        <li><a href="{{ route('website.setting.index') }}"> Setting <i class="fa fa-cogs text-theme"></i> </a></li>

                    </ul>
                </li>



                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                </ul>
            </div>
        </div>




        @yield('content')






    </div>


    <script src="{{ asset('public/backend') }}/assets/js/app.min.js" type="text/javascript"></script>
    <script src="{{ asset('public/backend') }}/assets/js/theme/default.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('public/backend/assets/sweetalert/sweetalert2@9.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="{{ asset('public/backend') }}/assets/plugins/tag-it/js/tag-it.min.js"></script>


    <script>
        @if(Session::has('message'))

        var type = "{{Session::get('alert-type','info')}}"

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

        $(document).ready(function() {


            $('.summernote').summernote({
                placeholder: "Let's write",
                height: 400,
                fontSizes: ['12', '14', '16', '18', '24', '36', '48'],
                toolbar: [
                    ['fontname', ['fontname']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert',
                        ['picture', 'myvideo', 'link', 'table', 'hr']
                    ],
                    ['misc', ['fullscreen', 'undo', 'redo']]
                ],
                disableDragAndDrop: true,
                shortcut: false

            });


        });


        $(document).ready(function() {
            $('.select2').select2();




        });

    </script>


    <script>
        tinymce.init({
            selector: '#mytextarea',
            toolbar: "undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent",
            width: '100%',
            height: 600,
            content_style: "body {font-size: 14pt;}",
            fontsize_formats: "12px 14px 18px 24px 30px 36px 48px 60px 72px 96px",
        });

    </script>


    <script>
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    )
                }
            })
        });

    </script>

    @yield('customjs')
</body>

</html>
