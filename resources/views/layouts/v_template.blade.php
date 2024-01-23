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
  <link href="{{asset('module')}}/toastr/toastr.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template')}}/css/style.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- =======================================================
  * Template Name: Bikin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  {{--tampilkan jika ada yield style --}}
  @yield('style');
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      color: #000;

      /* background dark blue */
      background: #0A1D56;
    }

    #hero {
      /* dark blue elegant */
      background: #0A1D56;
      color: #fff;
      border-bottom: 2px solid #49438d;
    }

    #hero h1 {
      color: #fff;
    }

    #hero h2 {
      color: #d1d1d1;
    }

    /* custom header, biru tua dan warna text menyesuaikan */
    #header,
    #footer {
      background: #3B3486;
      border-bottom: 2px solid #49438d;
      color: #fff;
    }

    .footer-top {
      background: #1D2B53 !important;
      border-top: 2px solid #49438d !important;
      color: #fff !important;
    }

    .credits {
      /* background: #3B3486; */
      /* border-top: 2px solid #49438d; */
      color: #fff !important;
    }

    #header h1.logo a {
      color: #fff;
    }

    #navbar ul li a {
      color: #fff;
    }

    .navbar .getstarted {
      background: #F2F597 !important;
      color: #000000 !important;
    }

    .navbar .getstarted:hover {
      background: #d2d582 !important;
      color: #000 !important;
    }

    .navbar .active {
      /* background: #F2F597 !important; */
      color: #F2F597 !important;
      /* bold */
      font-weight: bold;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ url('/') }}">{{ env('APP_NAME', 'Apps'); }}</a></h1>
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

  <script src="{{asset('module')}}/toastr/toastr.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('template')}}/js/main.js"></script>

  <script>
    // Logout
    $('#logoutBtn').click(function () {
      let token = localStorage.getItem('token');

      $.ajax({
        url: "{{ url('api/logout') }}",
        type: "POST",
        data: {
          _token: $('meta[name="csrf-token"]').attr('content')
        },
        "headers": {
          "Accept": "application/json",
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`
        },
        success: function(result){
          let message = result.message;
          let data = result.data;
          let success = result.success;

          if(success){
            toastr.success(message, 'Success');

            // hapus token dari local storage
            localStorage.removeItem('token');

            // setTimeout(function(){
              window.location.href = "{{ url('/') }}";
            // }, 1000);
          }else{
            // object to array
            message = Object.values(message);


            for(let i=0; i<message.length; i++){
              toastr.error(message[i], 'Error');
            }
          }
        },
        error: function(xhr, status, error){
          let message = xhr.responseJSON.message;
          let errors = xhr.responseJSON.errors;
          let success = xhr.responseJSON.success;

          if(success == false){
            $.each(errors, function(key, value){
              toastr.error(value, 'Error');
            });
          }else{
            toastr.error(message, 'Error');
          }
        }
      });
    });
  </script>

  {{--tampilkan jika ada yield script --}}
  @yield('script');
</body>

</html>