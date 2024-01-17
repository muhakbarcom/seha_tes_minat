@extends('layouts.v_template')

@section('title', 'Home')

@section('style')
<link rel="stylesheet" href="{{asset('module')}}/stepper/css/style.css">
<!-- Demo CSS -->
<link rel="stylesheet" href="{{asset('module')}}/stepper/css/demo.css">

@endsection

@section('content')
<section>
  <!-- Start Stepper HTML -->
  <div class="container">
    <div class="accordion" id="accordionExample">
      <div class="steps">
        <progress id="progress" value=0 max=100></progress>
        <div class="step-item">
          <button class="step-button text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            1
          </button>
          <div class="step-title">
            Form Consultation
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2
          </button>
          <div class="step-title">
            Guide and Information
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3
          </button>
          <div class="step-title">
            Tes Kecerdasan
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            4
          </button>
          <div class="step-title">
            Tes Bakat
          </div>
        </div>
      </div>

      <div class="card">
        <div id="headingOne">
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <div class="card mt-5">
                  <div class="card-body">
                    <h1 class="h3 mb-3 fw-normal">Form Consultation</h1>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                      <label for="floatingInput">Full Name</label>
                    </div>
                    <div class="form-floating">
                      <input type="date" class="form-control" id="date" value="{{ Auth::user()->tanggal_lahir }}">
                      <label for=" floatingInput">Birthday</label>
                    </div>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="education" value="{{ Auth::user()->asal_sekolah }}">
                      <label for="floatingInput">School or University</label>
                    </div>
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" placeholder=" "
                        value="{{ Auth::user()->email }}">
                      <label for="floatingInput">Email address</label>
                    </div>

                    <button id="next" class="btn btn-primary">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingTwo">

        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="card-body">
            CodeHim is one of the BEST developer websites that provide web designers and developers with a simple way
            to preview and download a variety of free code & scripts.<br>
            <p class="text-muted">nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
              squid
              single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
              beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
              lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
              probably haven't heard of them accusamus labore sustainable VHS.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingThree">

        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
            probably haven't heard of them accusamus labore sustainable VHS.
          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingFour">

        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
            probably haven't heard of them accusamus labore sustainable VHS.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Start Stepper HTML -->
</section>


@endsection


@section('script')
<script>
  const stepButtons = document.querySelectorAll('.step-button');
  const progress = document.querySelector('#progress');
  
  Array.from(stepButtons).forEach((button,index) => {
      button.addEventListener('click', () => {
          progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.
  
          stepButtons.forEach((item, secindex)=>{
              if(index > secindex){
                  item.classList.add('done');
              }
              if(index < secindex){
                  item.classList.remove('done');
              }
          })
      })
  })
</script>
@endsection