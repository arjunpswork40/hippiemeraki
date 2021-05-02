<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i><a href="tel:+91 7796888444">+91 7796 888 444</a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:info@zubisinn.com">reservations@zubisinn.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="https://www.facebook.com/zubisinn" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>

                            <a href="https://www.instagram.com/zubisinn/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                        {{-- <a href="#" class="bk-btn">Book Now</a> --}}
                        <!-- <div class="language-option">
                            <img src="img/flag.jpg" alt="">
                            <span>EN <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="#">Zi</a></li>
                                    <li><a href="#">Fr</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('/zubis/img/logo/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ request()->is('/') || request()->is('/*')? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="{{ request()->is('about-us') || request()->is('about-us/*')? 'active' : '' }}"><a href="{{ route('about-us') }}">About Us</a></li>
                                <li class="{{ request()->is('room') || request()->is('room/*')? 'active' : '' }}"><a href="{{ route('room') }}">Rooms</a></li>
                                <li class="{{ request()->is('news') || request()->is('news/*')? 'active' : '' }}"><a href="{{ route('news.blog') }}">Blog</a></li>
                                <li class="{{ request()->is('contact') || request()->is('contact/*')? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                                <li><button id="myBtn" class="btn btn-success" style="background-color: #cf8244;">Book Now</button></li>

                            </ul>
                        </nav>
                        {{-- <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
