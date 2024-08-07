@php
  $getLogo = App\Models\LogoModel::all();
  $getSeo = App\Models\SeoModel::all();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>KidKinder - Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="{{ !empty($getSeo[0]->title) ? $getSeo[0]->title : '' }}" name="title"/>
    <meta content="{{ !empty($getSeo[0]->meta_title) ? $getSeo[0]->meta_title : '' }}" name="meta_title"/>
    <meta content="{{ !empty($getSeo[0]->meta_keywords) ? $getSeo[0]->meta_keywords : '' }}" name="meta_keywords"/>
    <meta content="{{ !empty($getSeo[0]->description) ? $getSeo[0]->description : '' }}" name="description"/>
    <meta content="{{ !empty($getSeo[0]->meta_description) ? $getSeo[0]->meta_description : '' }}" name="meta_description"/>
    <!-- Favicon -->
    <link href="{{ url('public/images/logo/'.$getLogo[0]->favicon) }}" rel="icon"/>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>
    <!-- Flaticon Font -->
    <link href="{{ url('public/home/lib/flaticon/font/flaticon.css') }}" rel="stylesheet"/>
    <!-- Libraries Stylesheet -->
    <link href="{{ url('public/home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('public/home/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"/>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('public/home/css/style.css') }}" rel="stylesheet"/>
    @yield('style')
  </head>
  <body> 


      @include('layouts._header')

      @yield('content')

      @include('layouts._footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public/home/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('public/home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('public/home/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('public/home/lib/lightbox/js/lightbox.min.js') }}"></script>
    <!-- Contact Javascript File -->
    <script src="{{ url('public/home/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ url('public/home/mail/contact.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ url('public/home/js/main.js') }}"></script>
    @yield('script')
  </body>
</html>