<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title-bar')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('montana-master/img/logo-kediri.svg') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google font -->
    <link href="{{ asset('montana-master/fonts/cardo.css') }}" rel="stylesheet">
	<link href="{{ asset('montana-master/fonts/josefin.css') }}" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('montana-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('montana-master/css/sweetalert2.min.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Beranda</a></li>
                                        <li><a href="{{ route('wisata.dashboard') }}">Wisata</a></li>
                                        <li><a href="#">Layanan <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('pesantiket.form') }}">Pesan Tiket</a></li>
                                                <li><a href="blog.html">Rekomendasi Wisata</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Tentang Kami <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Kontak</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="{{ asset('montana-master/img/logo-kediri.svg') }}" width="100px" height="auto" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="https://id-id.facebook.com/kominfokabkediri" target="_blank" rel="noopener noreferrer">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/kominfokabkdr" target="_blank" rel="noopener noreferrer">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/dinaskominfo_kedirikab" target="_blank" rel="noopener noreferrer">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    {{-- <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>@yield('judul')</h3>
    </div>
    <!-- bradcam_area_end --> --}}
    
    @yield('content')
    
    <!-- footer -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Alamat Kantor
                            </h3>
                            <p class="footer_text">Jl. Erlangga No.1, Ngadirejo, Kec. Kota, Kota Kediri, Jawa Timur 64129</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Hubungi Kami
                            </h3>
                            <p class="footer_text">
                                <i class="fa fa-phone"> (0354) 691776</i>
                            </p>
                            <p class="footer_text">
                                <i class="fa fa-envelope"> disparbud@kedirikab.go.id</i>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <img src="{{ asset('montana-master/img/jawa-timur.svg') }}" width="100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('montana-master/img/logo-g20.png') }}" width="100px;">&nbsp;
                            <img src="{{ asset('montana-master/img/visit-indo.png') }}" width="150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-lg-9">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Dinas Pariwisata dan Kebudayaan Kota Kediri
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-xl-4 col-md-5 col-lg-3">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://id-id.facebook.com/kominfokabkediri" target="_blank" rel="noopener noreferrer">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/kominfokabkdr" target="_blank" rel="noopener noreferrer">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/dinaskominfo_kedirikab" target="_blank" rel="noopener noreferrer">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- JS here -->
    <script src="{{ asset('montana-master/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/popper.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/ajax-form.js') }}"></script>
    <script src="{{ asset('montana-master/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/scrollIt.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/wow.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/plugins.js') }}"></script>
    <script src="{{ asset('montana-master/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/sweetalert2.min.js') }}"></script>

    <!--contact js-->
    <script src="{{ asset('montana-master/js/contact.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.form.js') }}"></script>
    <script src="{{ asset('montana-master/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('montana-master/js/mail-script.js') }}"></script>

    <script src="{{ asset('montana-master/js/main.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>

    @yield('js')

</body>

</html>