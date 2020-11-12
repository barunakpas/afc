      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link d-flex">
              <div class="profile-image">
                <img src="{{ asset('image/'.Auth::user()->photo) }}" alt="image"/>
                <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
              </div>
              <div class="profile-name">
                <p class="name">
                  {{ Auth::user()->name }}
                </p>
                <p class="designation">
                  {{ Auth::user()->job }}
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Main</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Layouts</span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_product') }}">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Product</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_package') }}">
              <i class="icon-file-add menu-icon"></i>
              <span class="menu-title">Package</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-clipboard menu-icon"></i>
              <span class="menu-title">News</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin_blog') }}">List News</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('blog_create') }}">Add News</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_testimony') }}">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">Testimony</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_general') }}">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">General Setting</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_about') }}">
              <i class="icon-ribbon menu-icon"></i>
              <span class="menu-title">Join Now</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_slider') }}">
              <i class="icon-layers menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_home_section') }}">
              <i class="icon-layers menu-icon"></i>
              <span class="menu-title">Home Section</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_sosmed') }}">
              <i class="icon-globe menu-icon"></i>
              <span class="menu-title">Social Media</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_faq') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">FAQ</span>
            </a>
          </li>
        </ul>
      </nav>