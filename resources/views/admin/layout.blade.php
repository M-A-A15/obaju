
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>OBaju - Admin</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('admin-asset/assets') }}/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin-asset/assets') }}/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-asset/assets') }}/img/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    @yield('css')

    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('admin-asset/assets') }}/css/codebase.min.css">
    @yield('style')
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('admin-asset/assets') }}/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-inverse'                           Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-inverse'                       Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed  sidebar-inverse">


    <!-- Sidebar -->
    <!--
        Helper classes

        Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

        Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
        Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
            - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
    -->
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow px-15">
                    <!-- Mini Mode -->
                    <div class="content-header-section sidebar-mini-visible-b">
                        <!-- Logo -->
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">o</span><span class="text-primary">b</span>
                                </span>
                        <!-- END Logo -->
                    </div>
                    <!-- END Mini Mode -->

                    <!-- Normal Mode -->
                    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="{{ url('admin/produk') }}">
                                <span class="font-size-xl text-dual-primary-dark">O</span><span class="font-size-xl text-primary">Baju</span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Normal Mode -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li><a href="{{ url('/admin/transaksi') }}" class="{{ request()->is('admin/transaksi*') ? 'active' : '' }}"><i class="si si-diamond"></i> <span class="sidebar-mini-hide">Data Transaksi</span></a></li>
                        <li><a href="{{ url('/admin/user') }}" class="{{ request()->is('admin/user*') ? 'active' : '' }}"><i class="si si-users"></i> <span class="sidebar-mini-hide">Data User</span></a></li>
                        <li><a href="{{ url('/admin/barang') }}" class="{{ request()->is('admin/barang*') ? 'active' : '' }}"><i class="si si-bag"></i> <span class="sidebar-mini-hide">Data Produk</span></a></li>
                        <li><a href="{{ url('/admin/kategori') }}" class="{{ request()->is('admin/kategori*') ? 'active' : '' }}"><i class="si si-menu"></i> <span class="sidebar-mini-hide">Data Kategori</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->nama }}<i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                        <form action="{{ url('/logout') }}" method="post" id="formLogout">
                            @csrf
                        </form>
                        <a href="#" class="dropdown-item btnLogout"><i class="si si-logout mr-5"></i> Sign Out</a>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
            <div class="float-right">
                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
            </div>
            <div class="float-left">
                <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 2.0</a> &copy; <span class="js-year-copy">2017</span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{ asset('admin-asset/assets') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/jquery.slimscroll.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/jquery.scrollLock.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/jquery.appear.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/jquery.countTo.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/core/js.cookie.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{ asset('admin-asset/assets') }}/js/codebase.js"></script>

<!-- Page JS Plugins -->
@yield('js')

<!-- Page JS Code -->
@yield('script')

<script>
    $(document).ready(function() {
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
                    closeOnConfirm: false,
                    confirmButtonColor: "#f33c37",
                    showLoaderOnConfirm: true
                }).then(function() {
                    $('#formDelete').attr('action', url);
                    $('#formDelete').submit();
                });
        });
    });
</script>
</body>
</html>
