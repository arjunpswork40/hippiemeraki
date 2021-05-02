    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Zubis INN </title>
    <meta name="description" content="Make your trips unforgettable with Zubis INN, 3 Star Hotel">
    <meta property="og:type" content="website" key="ogtype" />
    <link rel="canonical" href="https://zubisinn.com/" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#dfa974">
    <meta name="keywords" content="Zubis INN, Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('/zubis/img/logo/z-logo-only.png') }}"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

   <!-- Css Styles -->
   <link rel="stylesheet" href="{{ asset('/zubis/css/nice-select.css') }}" type="text/css">
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
    <link rel="stylesheet" href="{{ asset('/zubis/css/style.css?v=1.6') }}" type="text/css">
    @stack('styles')

    <style>


        .menu-item .logo img{
            object-fit: contain;
            margin-top: -8px;
            width: 100%;
            max-width: 164px;
            /* background:  rgba(0, 0, 0, 0.7) !important; */
            padding: 6px;
            height: 79px;
        }
        .footer-section  .logo img{
            max-width: 100% !important;
            margin-left: -30px !important;
            height: auto;
            object-fit: contain;
            margin-top: -8px;
            width: 100%;
            max-width: 173px;
            /* box-shadow: 2px 3px 8px 3px #131313; */
            /* background: #fff; */
            border-radius: 3px;
            padding: 3px;

        }
        .footer-section .copyright-option .co-text{
        text-align:center;
        }
        .footer-section .copyright-option {
            padding: 6px 0;
        }
        .co-text p{
            margin:0 0 2px 0;
            font-size:14px;
        }
        .menu-item .logo{
            height:85px;
        }
        .tn-left a{
            color:#cf8244;
        }
        .footer-section {
            background: #012d1f;
            /* #00281b */
        }
        .fa-social a{
            color:#ff9200;
            margin-right: 25px;
        }
        .ft-contact a{
            color: #aaaab3;
            /* background: -webkit-linear-gradient(319.11deg,#f98f15 0%,#a7905b 100%);
            font-weight: 600;
            -webkit-background-clip: text;
             -webkit-text-fill-color: transparent; */
        }

        .ft-contact a:hover{
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
            /* justify-content: space-between; */
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
                 font-family: 'Roboto-Bold' !important;
            }
            .hero-text p{
                /* font-family: 'Dancing Script', cursive !important; */
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
        .top-social i:hover{
            color: #ff9200;
        }
        .top-social a{
            margin-left: 28px !important;
        }
        </style>






</head>

<body>



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
                <li style="margin-top: 10px;"><button id="mobileBtn" ontouchend="mobileMoal()" class="btn btn-success mobileBtn" style="background-color: #cf8244;">Book Now</button></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
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
{{-- <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div> --}}
<!-- Search model end -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    var mobileBtn = document.querySelector(".mobileBtn");
    function mobileMoal(){
        modal.style.display = "block";
        console.log('modal style applied00');
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        console.log('span')
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //     console.log('window')
    //     modal.style.display = "none";
    //   }
    // }


        window.onscroll = function() {checkScroll()};
        let navbar = document.querySelector(".header-section");
        let sticky = 670;

        function checkScroll() {
        if (window.pageYOffset >= sticky) {
        navbar.classList.add("enhance-header");
        // console.log("add")
        } else {
        navbar.classList.remove("enhance-header");
        // console.log("remove")
        }
        }



    </script>
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
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>

@stack('payment')
@include('pages.user.includes.toastr')
</body>

</html>
