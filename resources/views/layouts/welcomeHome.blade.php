<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Zubis INN ">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Zubis INN, unica, Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zubis INN </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    
   <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('/zubis/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/flaticon-extra/flaticon-extras.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/owl.carousel.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('/zubis/css/nice-select.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('/zubis/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/zubis/css/style.css') }}" type="text/css">
    @stack('styles')

    <style>
        body,p,h1,h2,h3,h4,h5,h6,span,div{
            font-family: 'Lato', sans-serif !important;
        
        }
        
        .menu-item .logo img{
            object-fit: contain;
            margin-top: -8px;
            width: 100%;
            max-width: 164px;
            background: #fff;
            padding: 6px;
        }
        .footer-section  .logo img{
            object-fit: contain;
            margin-top: -8px;
            width: 100%;
            max-width: 173px;
            box-shadow: 2px 3px 8px 3px #131313;
            background: #fff;
            border-radius: 3px;
            padding: 3px;
        
        }
        .footer-section .copyright-option .co-text{
        text-align:center;
        }
        .footer-section .copyright-option {
            padding: 9px 0;
        }
        .co-text p{
            margin:0 0 2px 0;
            font-size:14px;
        }
        .menu-item .logo{
            height:85px;
        }
        .tn-left a{
            color:#000;
        }
        .footer-section {
            background: #0b0c11;
        }
        .fa-social a{
            color:#ff9200;
        }
        .ft-contact a{
            color: #fff;
        }
        .blog-item{
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .blog-item.set-bg:hover {
            transform:  translateY(-5px) scale(1.01);
            /* box-shadow: 0 5px 16px 1px rgb(203 137 72 / 23%), 0 1px 4px 0 rgb(113 66 42 / 20%); */
            box-shadow: 0px 3px 13px rgba(0, 0, 0, 0.2) !important;
            transition-timing-function: ease-out;
            transition: 0.39s;
        }

        .blog-item .bi-text {

            background: #f9f9f9;
        bottom: 6px;
            /* -webkit-backdrop-filter: blur(10px); */
        /* backdrop-filter: blur(10px); */
        /* background-color: rgb(201 196 196 / 17%); */

        font-weight: 600;
        }
        .blog-item .bi-text h4 a{
                color: #cf8031;
                font-size: 22px;
                font-weight: 600;
            }
            .blog-item .bi-text .b-time {
                color: #747070;
                letter-spacing: 1px;
                padding-bottom: 6px;
            }
            .blog-item .bi-text h4 {
   
            margin-bottom: 10px;
            }
        .fa-social{
            display: flex;
            justify-content: space-between;
        }
 

        .footer-section .footer-text .ft-contact h6 {
            color: #cf8031;
        }
        .footer-section .footer-text .ft-newslatter h6 {
            color: #cf8031;
        }
        .section-title span,.service-item i {
            color: #cf8031;
        }
         
        .menu-item .nav-menu .mainmenu li a:after {
         
            background: #cf8031;}
            .hero-text h1{
                font-size: 124px;
                margin-bottom: 30px;
            }
            .hero-text p{
                font-family: 'Dancing Script', cursive !important;
                font-size: 31px;
            }
        
        @media only screen and (max-width: 991px){
        .offcanvas-menu-wrapper .header-configure-area .bk-btn {
            background: #cf8031;
        }
        .offcanvas-menu-wrapper .top-widget li i {
            color:#cf8031;
            }
            .offcanvas-menu-wrapper .top-social a {
            color: #ff9200;
        }
        .offcanvas-menu-wrapper .canvas-close {
            border: 1px solid #cf8031;
        }
        
        .canvas-close .icon_close{
            color:#cf8031; 
        }
        .hero-text h1{
            line-height: 49px;
            font-size: 72px;
        }
         .hero-text p{
                font-size: 24px;
            }

            .fa-social{
                display: block;
            }
            .fa-social a{
                margin-right: 40px;
            }


        
        }
        .booking-form form button{
            border-radius: 7px;
        }
        .top-widget a{
            color:#000;
        }
        
        </style>
        
        




</head>

<body>

       <!-- Page Preloder -->
       <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
    <!--     <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div> -->
        <div class="header-configure-area">
           <!--  <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div> -->
            {{-- <a href="#" class="bk-btn">Book Now</a> --}}
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                {{-- <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./rooms.html">Rooms</a></li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li> --}}

                <li class="{{ request()->is('/') || request()->is('/*')? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ request()->is('about-us') || request()->is('about-us/*')? 'active' : '' }}"><a href="{{ route('about-us') }}">About Us</a></li>
                <li class="{{ request()->is('room') || request()->is('room/*')? 'active' : '' }}"><a href="{{ route('room') }}">Rooms</a></li>
                <li class="{{ request()->is('news') || request()->is('news/*')? 'active' : '' }}"><a href="{{ route('news.blog') }}">News</a></li>
                <li class="{{ request()->is('contact') || request()->is('contact/*')? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>

                
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> <a href="tel:+0495 2431313">0495 2431313</a></li>
            <li><i class="fa fa-envelope"></i> <a href="mailto:reservations@zubisinn.com">reservations@zubisinn.com</a></li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

@include('pages.user.includes.header')

@yield('content')

@include('pages.user.includes.footer')

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
{{-- <script src="{{ asset('/zubis/js/jquery-3.3.1.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('/zubis/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/zubis/js/jquery.magnific-popup.min.js') }}"></script>
{{-- <script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script> --}}
@stack('scripts')
<script src="{{ asset('/zubis/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/zubis/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('/zubis/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/zubis/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stack('payment')
@include('pages.user.includes.toastr')
</body>

</html>
