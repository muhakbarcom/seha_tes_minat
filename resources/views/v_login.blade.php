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
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>


          <button class="w-100 btn btn-lg mt-2 btn-primary" id="signin" type="submit">Sign in</button>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('#signin').click(function(e){
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
  });
</script>
@endsection