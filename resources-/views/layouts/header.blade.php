<!DOCTYPE html>
<html lang="en" data-bs-theme-mode="light">

@php
    $fundUser = DB::table('fund_users')
    ->where('id', session('fund_user_id'))
    ->first();

@endphp

<head>
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}" />--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="multipurpose" />
    <meta name="keywords" content="multipurpose, lifeaid" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/jrjr.png') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('dist/css/nice-select.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('dist/css/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/ripple.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/silk-accordion.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/elements.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/colors/color.css') }}" title="default">
    <link rel="stylesheet" href="{{ asset('dist/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/layerslider/css/layerslider.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <style>
        header {
            box-shadow: 5px 5px 5px #ddd;
        }
        #loginmodal .modal-content {
            height: 250px;
        }
        @media screen and (max-width: 500px){
            #nav-icon3 {
                position: absolute;
                top: 25px;
                /*left: -65px;*/
                margin:unset;
            }
            .res-search {
                padding: 10px;
            }
            .responsive-header ul.socials li a {
                padding: 5px;
            }
        }


    </style>

    @yield('css')
    @yield('style')

</head>

<body>
<div class="site-layout">
    <header class="">
        {{--        <div class="topbar">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-sm-12">--}}
        {{--                        @php--}}
        {{--                            $headerBanner = \App\Models\HeaderBanner::first();--}}
        {{--                        @endphp--}}
        {{--                        @if (!empty($headerBanner))--}}
        {{--                            <div class="language-select" style="display: flex;justify-content:space-between">--}}
        {{--                                <span>{{ $headerBanner->header_text ?? "N/A" }}</span>--}}
        {{--                                <div>--}}
        {{--                                    <div style="cursor: pointer;" onclick="close()" class="cancle"><i class="fa-solid fa-xmark"></i></div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        @endif--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo">
                        <h1><a href="{{url('/')}}"><img src="{{ asset('assets/images/jrjr.png') }}" style="padding: 10px 0;" alt="" width="80px"></a></h1>
                    </div>
                </div>
                <div class="col-sm-10">
                    <nav>
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>

                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('cause-causes') }}">Causes</a></li>
                                <li><a href="{{ route('events-list') }}">Events</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>

                                <!-- <li><a href="register.php">Register</a></li> -->
                                {{-- <li><a href="#" data-modal="#modal" class="modal__trigger">Register</a></li> --}}
                                @if (!Auth::check())
                                    <li>
                                        <a href="{{url('/login')}}" data-ripple="" class="ls-l sl-2 layer-button" style="font:bold 11px 'open sans';color:#fff;letter-spacing:1px;padding:18px 18px;text-transform:uppercase;display:inline-block;" data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">Login</a>
                                        {{--                                        <a href="#"  data-toggle="modal" data-target="#loginmodal">Login</a>--}}
                                    </li>
                                @else
                                    @if (Auth::user())
                                        <li><a href="{{url('users/dashboard/'.encrypt(Auth::user()->id))}}" title="">
                                                Hello @if (isset(Auth::user()->fName))
                                                    {{ Auth::user()->fName }}
                                                @endif
                                            </a>
                                            <ul style="z-index:9999999">
                                                <li><a href="{{url('users/dashboard/'.encrypt(Auth::user()->id))}}" title="" data-ripple="">Dashboard</a></li>
                                                <li><a href="{{url('/signout')}}" title="" data-ripple="">Logout</a></li>
                                            </ul>
                                        </li>
                                        {{--                                        <li>--}}
                                        {{--                                            <a href="" class="modal__trigger" id="userdropdown" data-bs-toggle="dropdown" aria-expanded="false">--}}
                                        {{--                                            <span class="d-md-inline-block fw-medium">--}}
                                        {{--                                                @if (isset(Auth::user()->fName))--}}
                                        {{--                                                    Hello {{ Auth::user()->fName }}--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}

                                        {{--                                        <li>--}}
                                        {{--                                            <a href="{{url('/signout')}}" class="ls-l sl-2 layer-button" style="font:bold 11px 'open sans';color:#fff;letter-spacing:1px;padding:18px 18px;text-transform:uppercase;display:inline-block;background-color:red" data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">--}}
                                        {{--                                                Signout--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                    @endif
                                @endif

                                {{--                                @if (!(session()->has('fund_user_id')))--}}
                                {{--                                    <li>--}}
                                {{--                                        --}}{{--                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
                                {{--                                        --}}{{--                                            Launch demo modal--}}
                                {{--                                        --}}{{--                                        </button>--}}
                                {{--                                        <a href="#"  data-toggle="modal" data-target="#loginmodal">Login</a>--}}
                                {{--                                @else--}}

                                {{--                                    @if (session()->has('fund_user_id'))--}}
                                {{--                                        <li><a href="" class="modal__trigger" id="userdropdown" data-bs-toggle="dropdown" aria-expanded="false">--}}
                                {{--                                            <span class="d-md-inline-block fw-medium">--}}
                                {{--                                                @if (isset($fundUser->fName))--}}
                                {{--                                                    Hello {{ $fundUser->fName }}--}}
                                {{--                                                @endif--}}
                                {{--                                            </span>--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <ul class="dropdown-menu dropdown-menu-end" id="drop" aria-labelledby="userdropdown">--}}
                                {{--                                            <li><a class="dropdown-item" href="{{ route('signout') }}">Sign Out</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    @endif--}}
                                {{--                                @endif--}}

                                {{--                                     <li><a href="start-fundraiser.php" data-ripple=""--}}
                                {{--                                            class="ls-l sl-2 layer-button"--}}
                                {{--                                            style="font:bold 11px 'open sans';color:#fff;letter-spacing:1px;padding:18px 18px;text-transform:uppercase;display:inline-block;"--}}
                                {{--                                            data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">Start--}}
                                {{--                                            Fundraiser</a></li>--}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header 1 -->


    <div class="responsive-header">
        <div class="res-logo-area">
            {{--            <div class="col-sm-3 col-xs-4">--}}
            {{--            </div>--}}
            <div class="col-sm-8 col-xs-8">
                <a href="{{url('/')}}" title=""><img src="{{asset('assets/images/jrjr.png')}}" alt="" width="80px"></a>
            </div>
            <div class="col-sm-4 col-xs-4">
                <div id="nav-icon3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="responsive-menu">
            <a href="#" title=""><img src="{{asset('assets/images/jrjr.png')}}" alt=""></a>
            <ul>
                <li class="menu-item"><a href="{{url('/')}}">home</a></li>

                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('cause-causes') }}">Causes</a></li>
                <li><a href="{{ route('events-list') }}">Events</a></li>
                <li class="menu-item-has-children"><a href="#" title="">Hello</a><i class="ion-chevron-down"></i>
                    <ul class="submenu">
                        <li><a href="blog-listing-leftbar.html" title="" data-ripple="">blog with L.sidebar</a></li>
                        <li><a href="blog-listing-rightbar.html" title="" data-ripple="">blog with R.sidebar</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="little-info">
                <li><i class="ion-ios-telephone"></i><span>+971 8753563</span></li>
                <li><i class="ion-android-mail"></i><span><a href="http://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8fc3e6e9eaeee6ebcfe8e2eee6e3a1ece0e2">[email&#160;protected]</a></span>
                </li>
            </ul>
        </div>
        <a href="#" title="" class="res-search"><i class="fa fa-search"></i></a>
        <form class="search-insite" method="post">
            <i class="fa fa-times"></i>
            <input type="text" placeholder="search here">
            <button type="submit"></button>
        </form>
        <ul class="socials">
            <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>



    <!-- Modal -->
    <div class="modal" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {{--                            <div class="modal-header" style="visibility: hidden;">--}}
                {{--                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>--}}
                {{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--                                    <span aria-hidden="true">&times;</span>--}}
                {{--                                </button>--}}
                {{--                            </div>--}}
                <div class="modal-body">
                    <form class="payment-form1" method="POST" action="{{ url('fund/users-login') }}">
                        @csrf
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="wizardform-title">Log <span>in</span></h4>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <label for="phone" class="col-md-4 col-form-label text-md-end"> {{ __('Mobile No.') }}
                                            </label>
                                            <input id="phone" type="number" class="form-control" name="number" placeholder="Phone Number *" required autofocus>
                                            <input type="submit" class="wizard-btn" data-ripple="">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @yield('content')


    {{-- <section>
        <div class="gap nogap">
            <div class="news-letter light">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="newsletter-address">
                                <!-- <h4>
                                        <span>Connect :</span>
                                    </h4> -->
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <form method="" class="subscribe-us">
                                <input type="email" placeholder="enter your email">
                                <button type="submit">connect</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- newsletter contact & Subscribe --> --}}

    <footer class="light strip">
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget">
                            <div class="logo">
                                <h1><a href="{{url('/')}}"><img src="assets/images/logo/jrjr-logo.png" width="90px" alt=""></a></h1>
                            </div>
                            <ul class="address">
                                <li><i class="fa fa-phone"></i>+91 8975456545</li>
                                <li><i class="fa fa-envelope"></i><a href="#" class="__cf_email__" data-cfemail="">email</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget fadein">
                            <h4 class="widget-title">Quick Links</h4>
                            <ul class="address" style="margin-top: 0px;">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('cause-causes') }}">Causes</a></li>
                                <li><a href="{{ route('events-list') }}">Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget fadein">
                            <h4 class="widget-title">Important Links</h4>
                            <ul class="address" style="margin-top: 0px;">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('cause-causes') }}">Causes</a></li>
                                <li><a href="{{ route('events-list') }}">Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h4 class="widget-title">Flickr Feeds</h4>
                            <ul class="flickr-gallery">
                                <li><img src="images/resources/filcker-widget-1.jpg" alt=""></li>
                                <li><img src="images/resources/filcker-widget-2.jpg" alt=""></li>
                                <li><img src="images/resources/filcker-widget-3.jpg" alt=""></li>
                                <li><img src="images/resources/filcker-widget-4.jpg" alt=""></li>
                                <li><img src="images/resources/filcker-widget-5.jpg" alt=""></li>
                                <li><img src="images/resources/filcker-widget-6.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- fancy footer -->


    <div class="gap nogap">
        <div class="bottombar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright">
                            <span>© 2022, <a style="color: #00A859;" target="_blank" href="#">JRJR India.</a> All
                                Rights Reserved. Design & Developed By <a style="color: #00A859;" target="_blank" href="https://kotharitech.com/">KothariTech.</a></span>
                            <ul class="useful-links">
                                <li><a href="{{ route('events-list') }}" title="">Events</a></li>
                                <li><a href="{{ route('cause-causes') }}" title="">Our Causes</a></li>
                                <li><a class="volenter-btn" href="#" title="">be a volunteer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottombar -->


    <div class="new-valunteer-form">
        <a class="valunte-closed" href="#" title="" data-ripple=""><i class="fa fa-times"></i></a>
        <div class="form-title">
            <span>Following info is required</span>
            <h4>New Volunteer</h4>
        </div>
        <form method="get">
            <input type="text" placeholder="full name*" required>
            <input type="email" placeholder="Email*" required>
            <input type="text" placeholder="country" required>
            <input type="text" placeholder="city" required>
            <textarea name="address" cols="18" rows="4" placeholder="address"></textarea>
            <button type="submit" data-ripple="">submit</button>
        </form>
    </div>
    <!-- valunteer form -->

</div>



<script src="{{ asset('dist/js/jquery.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.scrolly.js') }}"></script>
{{-- <script src="{{ asset('dist/js/nice-select.js') }}"></script>--}}
<script src="{{ asset('dist/js/nprogress.js') }}"></script>
<script src="{{ asset('dist/js/jquery.counterup.min.js')}}"></script><!-- for funfacts -->
<script src="{{asset('dist/js/scrolltopcontrol.js')}}"></script>
<script src="{{asset('dist/js/turnBox.js')}}"></script>
<script src="{{asset('dist/js/onscreen.js')}}"></script>
<script src="{{asset('dist/js/ripple.js')}}"></script>
<script src="{{asset('dist/js/styleswitcher.js')}}"></script>
<script src="{{asset('dist/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('dist/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('dist/js/jquery.stickit.js')}}"></script>
<script src="{{asset('dist/js/script.js')}}"></script>
<script src="{{asset('dist/js/jquery.counterup-essential.js')}}"></script><!-- for funfacts counter -->

<script src="{{asset('dist/layerslider/js/greensock.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/layerslider/js/layerslider.transitions.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/layerslider-init.js')}}"></script>


<script src="{{ asset('dist/js/jquery.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script>
    let topMenuClose = document.querySelector('.topbar');
    let closeBtn = document.querySelector('.cancle');

    closeBtn.addEventListener('click', function() {
        topMenuClose.style.display = "none";
    });
</script>

<!-- Inside body starts -->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if ( localStorage.getItem("data-bs-theme") !== null ) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>


@yield('js')
@yield('script')
</body>

</html>
