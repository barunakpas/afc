
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
        @include('frontend.layouts.menu')
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