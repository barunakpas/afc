
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ isset($seo['title']) ? $seo['title'] : 'Afc Better Life' }} - {{ ENV('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ isset($seo['sort-desc']) ? $seo['sort-desc'] : 'Memperkenalkan Terobosan Ilmiah Modern Teknologi Jepang & Inggris Raya' }}" />
        <meta name="keywords" content="{{ isset($seo['keyword']) ? $seo['keyword'] : 'afc,health,medicine,salmon' }}" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="shreethemes@gmail.com" />
        <meta name="website" content="http://www.shreethemes.in" />
        <meta name="Version" content="v2.5.1" />
        @include('frontend.layouts.header')
        @yield('styles')

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="{{ route('home') }}">
                        <img src="{{ asset('image/'.GeneralHelp::general()->logo) }}" class="l-dark" height="24" alt="">
                        <img src="{{ asset('image/'.GeneralHelp::general()->logo) }}" class="l-light" height="24" alt="">
                    </a>
                </div>                 
                <div class="buy-button">
                    <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text=Saya mau bertanya mengenai AFC" target="_blank">
                        <div class="btn btn-primary login-btn-primary">Kirim Pesan</div>
                        <div class="btn btn-light login-btn-light">Kirim Pesan</div>
                    </a>
                </div><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span> 
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)">Product</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                @foreach(GeneralHelp::product() as $menuProduct)
                                <li><a href="{{ route('product', $menuProduct->slug) }}">{{ $menuProduct->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('about') }}">Join Our Team</a></li>
                        <li><a href="{{ route('news') }}">Article</a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)">About Us</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('testimony') }}">Testimony</a></li>
                                <li><a href="{{ route('faq') }}">Faq</a></li>
                            </ul>
                        </li>
                    </ul><!--end navigation menu-->
                    <div class="buy-menu-btn d-none">
                        <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text=Saya mau bertanya mengenai AFC" target="_blank" class="btn btn-primary">Kirim Pesan</a>
                    </div><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        @yield('content')
        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-footer">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        @include('frontend.layouts.footer')

        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        @include('frontend.layouts.footer-master')
        @yield('scripts')
    </body>
</html>