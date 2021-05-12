<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- ion slider -->
    <link rel="stylesheet" href="{{asset('plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/backend/adminlte.min.css')}}">
    <!-- Sytle -->
    <link rel="stylesheet" href="{{asset('css/backend/style.css')}}">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{asset('admin')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminElectro</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('image/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('admin/products') ? 'menu-open' : '' }} {{Request::is('admin/products/create') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{ Request::is('admin/products') ? 'active' : '' }} {{Request::is('admin/products/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">{{DB::table('products')->count()}}</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('products.create') }}" class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('discount.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product discount</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/attributes') ? 'menu-open' : '' }} {{Request::is('admin/attributes/create') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{ Request::is('admin/attributes') ? 'active' : '' }} {{Request::is('admin/attributes/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Attributes
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('attributes.index') }}" class="nav-link {{ Request::is('admin/attributes') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('attributes.create') }}" class="nav-link {{ Request::is('admin/attributes/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create attributes</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/categories') ? 'menu-open' : '' }} {{Request::is('admin/categories/create') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }} {{Request::is('admin/categories/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Categories
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">{{DB::table('categories')->count()}}</span>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.create') }}" class="nav-link {{ Request::is('admin/categories/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/brands') ? 'menu-open' : ''}} {{Request::is('admin/brands/create') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{Request::is('admin/brands') ? 'active' : '' }} {{Request::is('admin/brands/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copyright"></i>
                                <p>
                                    Brands
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('brands.index') }}" class="nav-link {{Request::is('admin/brands') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('brands.create') }}" class="nav-link {{Request::is('admin/brands/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create brands</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/users') ? 'menu-open' : ''}} {{Request::is('admin/users/create') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{Request::is('admin/users') ? 'active' : ''}} {{Request::is('admin/users/create') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{Request::is('admin/users') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link {{Request::is('admin/users/create') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/customers') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{Request::is('admin/customers') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Customers
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customers.index') }}" class="nav-link {{Request::is('admin/customers') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/orders') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{Request::is('admin/orders') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('admin/orders') }}" class="nav-link {{Request::is('admin/orders') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Order</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rated.index') }}" class="nav-link {{ Request::is('admin/rated') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Rated
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item {{Request::is('admin/banner') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link {{Request::is('admin/banner') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-external-link-square-alt"></i>
                                <p>
                                    Layout website
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('banner.index') }}" class="nav-link {{Request::is('admin/banner') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">LOG OUT</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('main')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <span id="year"></span> <a href="{{asset('admin')}}">AdminElectro</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('js/frontend/showmore/jquery.show-more.js') }}"></script>
    <!--  -->
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <!--  -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('js/frontend/select2.full.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/backend/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('js/backend/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('js/backend/pages/dashboard.js')}}"></script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Ion Slider -->
    <script src="{{asset('plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!-- Slick -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--  -->
    <script src="{{asset('js/backend/backend.js')}}"></script>
    <script type="text/javascript" async src="https://www.google-analytics.com/analytics.js"></script>
    <script>
        document.getElementById('year').append(new Date().getFullYear());

        function readURL(input, idimage, uploadwrp, content) {
            var filePath = input.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                input.value = '';
                return false;
            } else {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(uploadwrp).hide();

                        $(idimage).attr('src', e.target.result);
                        $(content).show();
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    removeUpload();
                }
            }
        }

        function removeUpload(input, content, imagewrp, idimage) {
            // $(input).replaceWith($(input).clone());
            $(input).val('').clone(true);

            $(content).hide();
            $(imagewrp).show();

            $(imagewrp).bind('dragover', function() {
                $(imagewrp).addClass('image-dropping');
            });
            $(imagewrp).bind('dragleave', function() {
                $(imagewrp).removeClass('image-dropping');
            });
            $(idimage).removeAttr('src');
        }



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 120
            })
        })

        // 
        $(function() {
            // select2
            $('#id_category').select2({
                theme: 'bootstrap4',
            })
            $('#id_brand').select2({
                theme: 'bootstrap4',
            })
            // ion slider
            $('#discount').ionRangeSlider({
                min: 0,
                max: 100,
                type: 'single',
                step: 1,
                postfix: '%',
                prettify: false,
                hasGrid: true
            })
        })
        $("#image1").change(function() {
            readURL(this, $('#blah1'));
        });


        $("#image2").change(function() {
            readURL(this, $('#blah2'));
        });
        $("#image3").change(function() {
            readURL(this, $('#blah3'));
        });
        $("#image4").change(function() {
            readURL(this, $('#blah4'));
        });
    </script>
    @include('sweetalert::alert')
</body>

</html>