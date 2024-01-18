@extends('layouts.v_template')

@section('title', 'Home')

@section('style')
<link rel="stylesheet" href="{{asset('module')}}/stepper/css/style.css">
<!-- Demo CSS -->
<link rel="stylesheet" href="{{asset('module')}}/stepper/css/demo.css">


<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:900');

  /* body {
    margin: 0;
    padding: 0;
    background-color: #292929;
    font-family: 'Montserrat', sans-serif;
  } */

  .wrapper {
    /* width: 100vw; */
    height: 50vh;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .my-super-cool-btn {
    position: relative;
    text-decoration: none;
    color: #ccc;
    letter-spacing: 1px;
    font-size: 2rem;
    box-sizing: border-box;
  }

  .my-super-cool-btn span {
    position: relative;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 200px;
  }

  .my-super-cool-btn span:before {
    content: '';
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    border-radius: 100%;
    border: 7px solid #3481ff;
    box-sizing: border-box;
    transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
    box-shadow: 0 30px 85px rgba(0, 0, 0, 0.14), 0 15px 35px rgba(0, 0, 0, 0.14);
  }

  .my-super-cool-btn:hover span:before {
    transform: scale(0.8);
    box-shadow: 0 20px 55px rgba(0, 0, 0, 0.14), 0 15px 35px rgba(0, 0, 0, 0.14);
  }

  .my-super-cool-btn .dots-container {
    opacity: 0;
    animation: intro 1.6s;
    animation-fill-mode: forwards;
  }

  .my-super-cool-btn .dot {
    width: 8px;
    height: 8px;
    display: block;
    background-color: #3481ff;
    border-radius: 100%;
    position: absolute;
    transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
  }

  .my-super-cool-btn .dot:nth-child(1) {
    top: 50px;
    left: 50px;
    transform: rotate(-140deg);
    animation: swag1-out 0.3s;
    animation-fill-mode: forwards;
    opacity: 0;
  }

  .my-super-cool-btn .dot:nth-child(2) {
    top: 50px;
    right: 50px;
    transform: rotate(140deg);
    animation: swag2-out 0.3s;
    animation-fill-mode: forwards;
    opacity: 0;
  }

  .my-super-cool-btn .dot:nth-child(3) {
    bottom: 50px;
    left: 50px;
    transform: rotate(140deg);
    animation: swag3-out 0.3s;
    animation-fill-mode: forwards;
    opacity: 0;
  }

  .my-super-cool-btn .dot:nth-child(4) {
    bottom: 50px;
    right: 50px;
    transform: rotate(-140deg);
    animation: swag4-out 0.3s;
    animation-fill-mode: forwards;
    opacity: 0;
  }

  .my-super-cool-btn:hover .dot:nth-child(1) {
    animation: swag1 0.3s;
    animation-fill-mode: forwards;
  }

  .my-super-cool-btn:hover .dot:nth-child(2) {
    animation: swag2 0.3s;
    animation-fill-mode: forwards;
  }

  .my-super-cool-btn:hover .dot:nth-child(3) {
    animation: swag3 0.3s;
    animation-fill-mode: forwards;
  }

  .my-super-cool-btn:hover .dot:nth-child(4) {
    animation: swag4 0.3s;
    animation-fill-mode: forwards;
  }

  @keyframes intro {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  @keyframes swag1 {
    0% {
      top: 50px;
      left: 50px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      top: 20px;
      left: 20px;
      width: 8px;
      opacity: 1;
    }
  }

  @keyframes swag1-out {
    0% {
      top: 20px;
      left: 20px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      top: 50px;
      left: 50px;
      width: 8px;
      opacity: 0;
    }
  }

  @keyframes swag2 {
    0% {
      top: 50px;
      right: 50px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      top: 20px;
      right: 20px;
      width: 8px;
      opacity: 1;
    }
  }

  @keyframes swag2-out {
    0% {
      top: 20px;
      right: 20px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      top: 50px;
      right: 50px;
      width: 8px;
      opacity: 0;
    }
  }

  @keyframes swag3 {
    0% {
      bottom: 50px;
      left: 50px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      bottom: 20px;
      left: 20px;
      width: 8px;
      opacity: 1;
    }
  }

  @keyframes swag3-out {
    0% {
      bottom: 20px;
      left: 20px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      bottom: 50px;
      left: 50px;
      width: 8px;
      opacity: 0;
    }
  }

  @keyframes swag4 {
    0% {
      bottom: 50px;
      right: 50px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      bottom: 20px;
      right: 20px;
      width: 8px;
      opacity: 1;
    }
  }

  @keyframes swag4-out {
    0% {
      bottom: 20px;
      right: 20px;
      width: 8px;
    }

    50% {
      width: 30px;
      opacity: 1;
    }

    100% {
      bottom: 50px;
      right: 50px;
      width: 8px;
      opacity: 0;
    }
  }
</style>

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
                    <div class="form-floating mt-2">
                      <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                      <label for="floatingInput">Full Name</label>
                    </div>
                    <div class="form-floating mt-2">
                      <input type="date" class="form-control" id="date" value="{{ Auth::user()->tanggal_lahir }}">
                      <label for=" floatingInput">Birthday</label>
                    </div>
                    <div class="form-floating mt-2">
                      <input type="text" class="form-control" id="education" value="{{ Auth::user()->asal_sekolah }}">
                      <label for="floatingInput">School or University</label>
                    </div>
                    <div class="form-floating mt-2">
                      <input type="email" class="form-control" id="email" placeholder=" "
                        value="{{ Auth::user()->email }}">
                      <label for="floatingInput">Email address</label>
                    </div>

                    <div class="d-flex justify-content-end">
                      <button id="next-1" class="btn btn-primary mt-3"> <i class="fa fa-save"></i> Save & Next</button>
                    </div>


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

            {{-- buatkan saya tombol di kanan --}}
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary mt-3" id="next-2"> <i class="fa fa-arrow-right"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingThree">

        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="card-body">
            <div class="row" id="start-3">
              <div class="col">
                <div class="wrapper">
                  <a href="#" class="my-super-cool-btn">
                    <div class="dots-container">
                      <div class="dot"></div>
                      <div class="dot"></div>
                      <div class="dot"></div>
                      <div class="dot"></div>
                    </div>
                    <span>Mulai!</span>
                  </a>
                </div>
              </div>
            </div>

            {{-- tempat pertanyaan --}}
            <div id="tes-kecerdasan">

            </div>
            <nav aria-label="Page navigation example" id="container-pagination-tes-kecerdasan">
              <ul class="pagination justify-content-center" id="pagination-tes-kecerdasan">
              </ul>
            </nav>

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

<script>
  $(document).ready(function () {

    // setiap inputan selesai di isi
    $('#name, #date, #education, #email').on('blur', function() {
    updateDataConsultation();
    });
      

      $('#next-1').click(function () {
        next1();
      });

      $('button[data-bs-target="#collapseTwo"]').click(function () {
          if (!$('button[data-bs-target="#collapseTwo').hasClass('done')) {
            if(validation1()  == false){

              // wait 1 detik
              setTimeout(function () {
                  
              // collapseTwo hide
              $('#collapseTwo').collapse('hide');

              // progress bar
              $('#progress').val(0);

              // buka collapseOne
              $('#collapseOne').collapse('show');

              }, 1000);
            }
          }
      });

      $('button[data-bs-target="#collapseThree"],button[data-bs-target="#collapseFour"]').click(function () {
          var errNumber = localStorage.getItem('errNumber');

          if(!validation1() || errNumber > 0){
            back1();
          }
      });

      $('#next-2').click(function () {
          // collapseThree show
          $('#collapseThree').collapse('show');

          // progress bar
          $('#progress').val(67);

          // beri class "done" pada button yang mempunyai data-bs-target = collapseTwo 
          $('button[data-bs-target="#collapseTwo"]').addClass('done');
      });
  });

  function next1() {
         updateDataConsultation();

          if(!validation1()){
            return false;
          }

          // toastr.success('Data Berhasil Disimpan');

          // beri class "done" pada button yang mempunyai data-bs-target = collapseOne 
          $('button[data-bs-target="#collapseOne"]').addClass('done');

          // collapseTwo show
          $('#collapseTwo').collapse('show');

          // progress bar
          $('#progress').val(34);
          localStorage.setItem('errNumber', 0);
  }

  function validation1(){
      var storage = localStorage.getItem('data');
          var data = JSON.parse(storage);

          
          var name = data.name;
          var date = data.date;
          var education = data.education;
          var email = data.email;

          // validasi semua inputan tidak boleh kosong
          if (name == '') {
              toastr.error('Nama Lengkap Tidak Boleh Kosong');
              localStorage.setItem('errNumber', 1);
              return false;
          } else if (date == '') {
              toastr.error('Tanggal Lahir Tidak Boleh Kosong');
              localStorage.setItem('errNumber', 1);
              return false;
          } else if (education == '') {
              toastr.error('Asal Sekolah Tidak Boleh Kosong');
              localStorage.setItem('errNumber', 1);
              return false;
          } else if (email == '') {
              toastr.error('Email Tidak Boleh Kosong');
              localStorage.setItem('errNumber', 1);
              return false;
          }

          // validasi email
          if (validateEmail(email) == false) {
              toastr.error('Format Email Salah');
              localStorage.setItem('errNumber', 1);
              return false;
          }
          localStorage.setItem('errNumber', 0);

          return true;
  }

  validateEmail = function (email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
  }

  function back1() {
      // wait 1 detik
      setTimeout(function () {
                  // progress bar
                  $('#progress').val(0);

                  // hilangkan class "done" pada button yang mempunyai data-bs-target = collapseTwo Three Four
                  $('button[data-bs-target="#collapseTwo"],button[data-bs-target="#collapseThree"],button[data-bs-target="#collapseFour"]').removeClass('done');
    
                  // buka collapseTwo
                  $('#collapseOne').collapse('show');
    
                  }, 1000);
  }


  function updateDataConsultation() {
      var name = $('#name').val();
      var date = $('#date').val();
      var education = $('#education').val();
      var email = $('#email').val();

      var data = {
          name: name,
          date: date,
          education: education,
          email: email
      }

      localStorage.setItem('data', JSON.stringify(data));

      if(!validation1()){
        return false;
      }

      toastr.success('Data Berhasil Disimpan');
  }
</script>

<script>
  var dataOption = [];
  var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');

  $(document).ready(function () {

    // isi data option
    $.ajax({
      url: "{{ url('api/skor') }}",
      type: "GET",
      success: function(result){
        let message = result.message;
        let data = result.data;
        let success = result.success;
        
        if(success == true){
          dataOption = data;
        }else{
          console.log(message)
        }
      }
    });

    $('#tes-kecerdasan').hide();
    $('#container-pagination-tes-kecerdasan').hide();


    if(dataTestKecerdasan != null){
      $('#tes-kecerdasan').show();
      $('#container-pagination-tes-kecerdasan').show();

      $('#start-3').hide();

      fillTestKecerdasan(1)
    }


    $('#start-3').click(function () {
      $('#tes-kecerdasan').show();
      $('#container-pagination-tes-kecerdasan').show();

      $('#start-3').hide();

      fillTestKecerdasan(1)
    });

    // trigger ketika form-check-input di click maka console.log semua isinya
    $(document).on('click', '.form-check-input', function () {
      // Get the label's "for" attribute
      let name = $(this).attr('id');
      // Find the associated input value using the "for" attribute
      let value = $(this).val();
      // Extract indikator_id from the name attribute
      let indikator_id = name.split('_')[0];
      let indikator_res = name.split('_')[1];

      var res = {
        'indikator_id' : indikator_id,
        'indikator_res' : indikator_res,
        'value' : value
      }
      
      // update atau insert ke local storage
      updateDataTestKecerdasan(res);
    });
  });

  function updateDataTestKecerdasan(res){
    var storage = localStorage.getItem('dataTestKecerdasan');
    var data = JSON.parse(storage);

    if(data == null){
      data = [];
    }

    // cari index dari indikator_id
    var index = data.findIndex(x => x.indikator_id == res.indikator_id);

    // jika index tidak ditemukan
    if(index == -1){
      data.push(res);
    }else{
      data[index] = res;
    }

    localStorage.setItem('dataTestKecerdasan', JSON.stringify(data));
  }

  // tes kecerdasan
  function fillTestKecerdasan(page){
    var url = "{{ url('api/indikator/1') }}";
    
    $.ajax({
      url: url,
      type: "GET",
      data : {
        'page' : page
      },
      success: function(result){
        let message = result.message;
        let data = result.data.data;
        let success = result.success;
        let linksPagination = result.data.links;
        
        if(success == true){
          let html = '';
          
          data.forEach(function(item,index){
            html += stringTemplateIndikator(item,dataOption);
          });

          fillPaginationTestKecerdasan(linksPagination);

          $('#tes-kecerdasan').html(html);
          
        }else{
          console.log(message)
        }
      }
    });
  }

  function fillPaginationTestKecerdasan(links){

    let html = '';

    links.forEach(function(item,index){
      // hanya angka
      if(item.label != '&laquo; Previous' && item.label != 'Next &raquo;'){
        let page = item.label;
        let active = (item.active) ? 'active' : '';
        html += `<li class="page-item ${active}"><a class="page-link" href="#" onclick="fillTestKecerdasan(${page})">${page}</a></li>`;
      }
    })

    $('#pagination-tes-kecerdasan').html(html);
  }

  function stringTemplateIndikator(indikator,option){

    let optionHtml = '';
    let indikator_id = indikator.ID;
    let row_number = indikator.row_number;
    let indikator_desc = indikator.INDIKATOR;

    // cek di dataTestKecerdasan berdasaarkan indikator_id, jika ada maka active
    let dataTestKecerdasanTemp = JSON.parse(dataTestKecerdasan);
    let temp = dataTestKecerdasanTemp.find(x => x.indikator_id == indikator_id);

    option.forEach(function(item,index){
       let active = (temp != undefined && temp.indikator_res == item.CODE) ? 'checked' : '';

        optionHtml+= `<div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="indikator_${indikator_id}" id="${indikator_id}_${item.CODE}" value="${item.POINT}" ${active}>
                        <label class="form-check-label" for="${indikator_id}_${item.CODE}">${item.NAME}</label>
                      </div>`
    })

    return `<div class="row mb-5">
                <div class="col">
                  <p>${row_number}. ${indikator_desc}
                  </p>
                  <div class="card">
                    <div class="card-body">
                      ${optionHtml}
                    </div>
                  </div>
                </div>
              </div>`;
  }

  

</script>
@endsection