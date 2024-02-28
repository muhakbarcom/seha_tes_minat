@extends('layouts.v_template')

@section('title', 'Home')

@section('style')
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
@endsection

@section('content')
<section>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form>
          <h1 class="h3 mb-3 fw-normal text-light">Please sign in</h1>

          <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>


          <button class="w-100 btn btn-lg mt-2 btn-primary" id="signin" type="submit">Sign in</button>

          <div class="mt-3">
            <a href="{{ url('register') }}">Don't have account? Register here!</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection

@section('script')
<script>
  var btn_signin = $('#signin');
  $(document).ready(function(){
    btn_signin.click(function(e){
      // ubah tombol jadi spinner
      btn_signin.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Loading...`);
      
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        url: "{{ url('api/login') }}",
        type: "POST",
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          email: email,
          password: password
        },
        success: function(result){
          let message = result.message;
          let data = result.data;
          let success = result.success;

          // masukan token ke local storage
          localStorage.setItem('token', data.token);

          if(success){
            toastr.success(message, 'Success');

            localStorage.removeItem('dataTestKecerdasan');
            localStorage.removeItem('dataTestbakat');
            localStorage.removeItem('totalIndikator_bakat');
            localStorage.removeItem('totalIndikator_kecerdasan');
            localStorage.removeItem('errNumber');
            localStorage.removeItem('data');
            localStorage.removeItem('get_result');
            localStorage.setItem('resultHTML', '');

            btn_signin.html('Sign in');

              window.location.href = "{{ url('/') }}";
          }else{
            message = Object.values(message);

            toastr.error(message, 'Error');

            btn_signin.html('Sign in');
          }
        },
        error: function(xhr, status, error){
          let message = xhr.responseJSON;
          let errors = xhr.responseJSON.errors;
          let success = xhr.responseJSON.success;

          btn_signin.html('Sign in');

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
  });
</script>
@endsection