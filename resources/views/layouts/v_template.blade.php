<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template')}}/img/favicon.png" rel="icon">
  <link href="{{asset('template')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('template')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('template')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('template')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('template')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('template')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template')}}/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bikin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  {{--tampilkan jika ada yield style --}}
  @yield('style');
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">{{ env('APP_NAME', 'Apps'); }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('template')}}/img/logo.png" alt="" class="img-fluid"></a>-->

      @include('layouts.v_nav')

    </div>
  </header><!-- End Header -->


  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    @include('layouts.v_footer')
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('template')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('template')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('template')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('template')}}/vendor/php-email-form/validate.js"></script>

  <script src="{{asset('js')}}/jquery-3.7.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template')}}/js/main.js"></script>

  {{--tampilkan jika ada yield script --}}
  @yield('script');

</body>

</html>