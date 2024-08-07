  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{ url('admin/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>

      @if(Auth::user()->isRole == 1)
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) == 'categories') @else collapsed @endif" href="{{ url('admin/categories') }}">
            <i class="bi bi-bounding-box"></i>
            <span>Categories</span>
          </a>
        </li>
      @endif


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'blog') @else collapsed @endif" href="{{ url('admin/blog') }}">
          <i class="bi bi-bricks"></i>
          <span>Blog</span>
        </a>
      </li>

      @if(Auth::user()->isRole == 1)
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) == 'logo') @else collapsed @endif" href="{{ url('admin/logo') }}">
            <i class="bi bi-bricks"></i>
            <span>Logo</span>
          </a>
        </li>
      @endif

      @if(Auth::user()->isRole == 1)
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) == 'seo') @else collapsed @endif" href="{{ url('admin/seo') }}">
            <i class="bi bi-bricks"></i>
            <span>Seo</span>
          </a>
        </li>
      @endif

      @if(Auth::user()->isRole == 1)
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) == 'users') @else collapsed @endif" href="{{ url('admin/users') }}">
            <i class="bi bi-people"></i>
            <span>User</span>
          </a>
        </li>
      @endif

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'account') @else collapsed @endif" href="{{ url('admin/account/setting') }}">
          <i class="bi bi-key"></i>
          <span>Account Setting</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'change') @else collapsed @endif" href="{{ url('admin/change/password') }}">
          <i class="bi bi-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'logout') @else collapsed @endif" href="{{ url('admin/logout') }}">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->