<header id="topnav" class="defaultscroll sticky">
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
            <ul class="navigation-menu nav-light">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Product</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach(GeneralHelp::product() as $menuProduct)
                        <li><a href="{{ route('product', $menuProduct->slug) }}">{{ $menuProduct->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('news') }}">News</a></li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">About Us</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('testimony') }}">Testimony</a></li>
                        <li><a href="{{ route('faq') }}">Faq</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('about') }}">Join Now</a></li>
            </ul><!--end navigation menu-->
            <div class="buy-menu-btn d-none">
                <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text=Saya mau bertanya mengenai AFC" target="_blank" class="btn btn-primary">Kirim Pesan</a>
            </div><!--end login button-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->