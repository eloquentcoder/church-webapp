<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Prophetic Tribe | @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.jpeg') }}">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="{{ asset('home/css/normalize.css')}}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('home/css/main.css')}}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('home/css/animate.min.css')}}">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css')}}">
        <!-- Main Menu CSS -->
        <link rel="stylesheet" href="{{ asset('home/css/meanmenu.min.css')}}">
        <!-- Magnific CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('home/css/magnific-popup.css')}}">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" href="{{ asset('home/vendor/slider/css/nivo-slider.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('home/vendor/slider/css/preview.css')}}" type="text/css" media="screen">
        <!-- Custom CSS -->
        <link href="{{ asset('dashboard/plugins/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('home/style.css')}}">
        <!-- Modernizr Js -->
        <script src="{{ asset('home/js/modernizr-2.8.3.min.js')}}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an
        <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader" class="preloader">
            <div class="items">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
            </div>
        </div>
        <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper">
            <!-- Header Area Start Here -->
            <header>
                <div id="header-one" class="header-area header-fixed full-width-compress">
                    <div class="main-menu-area" id="sticker">
                        <div class="container-fluid">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-lg-2 col-md-2 d-none d-lg-block">
                                    <div class="logo-area">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('logo.jpeg') }}" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 possition-static">
                                    <div class="eventalk-main-menu">
                                        <nav class="d-none d-lg-block">
                                            <ul>
                                                <li class="{{ Request::url() === url('/') ? 'current' : '' }}">
                                                    <a href="{{ route('home') }}">Home</a>
                                                </li>
                                                <li class="{{ Request::url() === url('/about') ? 'current' : '' }}">
                                                    <a href="{{ route('about')}}">About</a>
                                                </li>
                                                <li class="{{ Request::url() === url('/events') ? 'current' : '' }}">
                                                    <a href="{{ route('events') }}">Events</a>
                                                </li>
                                                <li class="{{ Request::url() === url('/testimonies') ? 'current' : '' }}">
                                                    <a href="{{ route('testimonies') }}">Testimonies</a>
                                                </li>
                                                <li class="{{ Request::url() === url('/sermons') ? 'current' : '' }}">
                                                    <a href="{{ route('sermons') }}">Sermons</a>
                                                </li>
                                                <li class="{{ Request::url() === url('/prayer-requests') ? 'current' : '' }}">
                                                    <a href="{{ route('prayer-request') }}">Prayer-Request</a>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 d-none d-lg-block">
                                    <ul class="header-action-items">
                                        <li>
                                            <a href="{{ route('donations') }}" title="Buy Tickets" class="btn-fill size-xs color-yellow border-radius-5">Giving</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Area End Here -->


            @yield('content')


            <!-- Footer Area Start Here -->
            <div class="footer-layout2">
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="widget">
                                    <a class="footer-widget-logo" href="{{ route('home') }}">
                                        <img class="img-fluid" src="img/logo.png" alt="logo">
                                    </a>
                                    <div class="footer-widget-about">
                                        <p>{{ $setting->about_church_excerpt ?? '' }}.</p>
                                    </div>
                                    <div class="footer-widget-contact">
                                        <a href="tel:+5647-345-2224">{{ $setting->phone_number ?? '' }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <h3 class="widgettitle">Useful Links</h3>
                                    <div class="footer-widget-menu">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home')}}">Home</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('about')}}">About Us</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('events')}}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <h3 class="widgettitle">Newsletter</h3>
                                    <div class="footer-widget-newsletter">
                                        <p>Subscribe to our newsletter to receive news and information concerning upcoming events.</p>
                                        <div class="input-group stylish-input-group">
                                            <input type="email" placeholder="E-mail address" name="email" class="form-control" required="">
                                            <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-area">
                    <p>© 2020 Prophetic Tribe. All Rights Reserved. Designed by
                                <a target="_blank" href="#">
                                A4Mation</a>
                            </p>
                </div>
            </div>
            <!-- Footer Area End Here -->
        </div>
        <!-- Wrapper End -->
        <!-- jquery-->
        <script src="{{ asset('home/js/jquery-2.2.4.min.js')}}"></script>
        <!-- Plugins js -->
        <script src="{{ asset('home/js/plugins.js')}}"></script>
        <!-- Popper js -->
        <script src="{{ asset('home/js/popper.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('home/js/bootstrap.min.js')}}"></script>
        <!-- Nivo slider js -->
        <script src="{{ asset('home/vendor/slider/js/jquery.nivo.slider.js')}}"></script>
        <script src="{{ asset('home/vendor/slider/home.js')}}"></script>
        <!-- Meanmenu Js -->
        <script src="{{ asset('home/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Srollup js -->
        <script src="{{ asset('home/js/jquery.scrollUp.min.js')}}"></script>
        <!-- jquery.counterup js -->
        <script src="{{ asset('home/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('home/js/waypoints.min.js')}}"></script>
        <!-- Countdown js -->
        <script src="{{ asset('home/js/jquery.countdown.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{ asset('home/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('home/js/isotope.pkgd.min.js')}}"></script>
        <!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
        <!-- Magnific Popup -->
        <script src="{{ asset('home/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Custom Js -->
        <script src="{{ asset('home/js/validator.min.js')}}"></script>

        <script src="{{ asset('dashboard/plugins/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('dashboard/plugins/general/js/global/integration/plugins/sweetalert2.init.js')}}" type="text/javascript"></script>

        <script src="{{ asset('home/js/main.js')}}"></script>

        @yield('footer-scripts')

    </body>

</html>
