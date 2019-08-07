
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Obaju</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('customer/vendor') }}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('customer/vendor') }}/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('customer/vendor') }}/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('customer/vendor') }}/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('customer/css') }}/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('customer/css') }}/custom.css">

    @yield('css')
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- navbar-->
<header class="header mb-5">
    <!--
    *** TOPBAR ***
    _________________________________________________________
    -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="offset-6 col-lg-6 text-center text-lg-right">
                    <ul class="menu list-inline mb-0">
                        @if(@auth()->user())
                            <li class="list-inline-item" style="color: #fff">{{ auth()->user()->nama }}</li>
                            <li class="list-inline-item">
                                <a href="#" class="btnLogout">Logout</a>
                                <form action="{{ url('logout') }}" method="post" id="formLogout" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="list-inline-item"><a href="{{ url('/login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customer login</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input id="email-modal" type="text" placeholder="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input id="password-modal" type="password" placeholder="password" class="form-control">
                            </div>
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- *** TOP BAR END ***-->


    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="{{ url('/') }}" class="navbar-brand home"><img src="{{ asset('customer/img') }}/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="{{ asset('customer/img') }}/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
            <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ url('/order') }}" class="nav-link">My Orders</a></li>
                </ul>
                <div class="navbar-buttons d-flex justify-content-end">
                    <!-- /.nav-collapse-->
                    <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                        <a href="{{ url('/cart') }}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i>
                            @if(@auth()->user() && (auth()->user()->cart->count() > 0))
                            <span>{{ auth()->user()->cart->count() }} items in cart</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="search" class="collapse">
        <div class="container">
            <form action="{{ url('produk') }}" method="get" id="header_search_form" role="search" class="ml-auto">
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control" name="search" value="{{ @request()->search }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
@yield('content')


<!--
*** COPYRIGHT ***
_________________________________________________________
-->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-center text-lg-left">©2019 Obaju.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/p/big-bootstrap-tutorial">Bootstrapious</a>
                    <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
                </p>
            </div>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END ***-->
<!-- JavaScript files-->
<script src="{{ asset('customer/vendor') }}/jquery/jquery.min.js"></script>
<script src="{{ asset('customer/vendor') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('customer/vendor') }}/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{ asset('customer/vendor') }}/owl.carousel/owl.carousel.min.js"></script>
<script src="{{ asset('customer/vendor') }}/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
<script src="{{ asset('customer/js') }}/front.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/plugins/sweetalert2/sweetalert2.all.min.js"></script>

@yield('js')
<script>
    $(document).ready(function(){
        $('.btnLogout').on('click', function(e){
            e.preventDefault();
            $('#formLogout').submit();
        });
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            swal({
                title: "Konfirmasi tindakan",
                text: "Apakah anda yakin ingin menghapus data ini?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#f33c37"
            }).then(function(result) {
                $('#formDelete').attr('action', url);
                $('#formDelete').submit();
            });
        });
    });
</script>
</body>
</html>
