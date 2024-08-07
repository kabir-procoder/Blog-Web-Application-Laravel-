@php
  $getLogo = App\Models\LogoModel::all();
@endphp


<div class="container-fluid bg-light position-relative shadow">
  <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <img style="width: 180px; height: 40px; " src="{{ url('public/images/logo/'.$getLogo[0]->mainlogo) }}" alt="">
    </a>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between">

      @php
        $getHeaderMenu = App\Models\CategoriesModel::getCategoryMenu();
      @endphp

      <div class="navbar-nav font-weight-bold mx-auto py-0">
        <a href="{{ url('/') }}" class="nav-item nav-link @if(Request::segment(1) == '/') active @endif">Home</a>
        @foreach($getHeaderMenu as $value)
          <a href="{{ url($value->slug) }}" class="nav-item nav-link @if(Request::segment(1) == $value->slug) active @endif">{{ $value->name }}</a>
        @endforeach
{{--         <a href="{{ url('about') }}" class="nav-item nav-link @if(Request::segment(1) == 'about') active @endif">About</a>
        <a href="{{ url('class') }}" class="nav-item nav-link @if(Request::segment(1) == 'class') active @endif">Classes</a>
        <a href="{{ url('team') }}" class="nav-item nav-link @if(Request::segment(1) == 'team') active @endif">Team</a>
        <a href="{{ url('gallery') }}" class="nav-item nav-link @if(Request::segment(1) == 'gallery') active @endif">Gallery</a> --}}
        {{-- <a href="{{ url('blog') }}" class="nav-item nav-link @if(Request::segment(1) == 'blog') active @endif">Blog</a> --}}
        {{-- <a href="{{ url('contact') }}" class="nav-item nav-link @if(Request::segment(1) == 'contact') active @endif">Contact</a> --}}
        <a href="{{ url('blog') }}" class="nav-item nav-link @if(Request::segment(1) == 'blog') active @endif">Blog</a>
      </div>
      <a href="{{ url('login') }}" class="btn btn-primary px-4 mr-2">Login</a>
      <a href="{{ url('registration') }}" class="btn btn-primary px-4">Register</a>
    </div>
  </nav>
</div>