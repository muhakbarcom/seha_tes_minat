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

  .estetik-background-right {
    /* background: linear-gradient(45deg, #0c047d, #5c47ff); */
    background: linear-gradient(45deg, #FC6736, #ff9e7e);
    background-size: 400% 400%;
    animation: gradientBackground 5s infinite;
    clip-path: polygon(10% 0%, 100% 0, 90% 100%, 0 100%);
  }

  .estetik-background-left {
    /* background: linear-gradient(45deg, #0c047d, #5c47ff); */
    background: linear-gradient(45deg, #FC6736, #ff9e7e);
    background-size: 400% 400%;
    animation: gradientBackground 10s infinite;
    clip-path: polygon(10% 100%, 100% 100%, 90% 0, 0 0);
  }

  /* riasec 1 grey metalic */
  .estetik-background-RIASEC-1 {
    background: linear-gradient(45deg, #242424, #7ED7C1);
    background-size: 400% 400%;
    animation: gradientBackground 5s infinite;
  }

  .estetik-background-RIASEC-2 {
    background: linear-gradient(45deg, #7ED7C1, #F0DBAF);
    background-size: 400% 400%;
    animation: gradientBackground 5s infinite;
  }

  .estetik-background-RIASEC-3 {
    background: linear-gradient(45deg, #F0DBAF, #F0A500);
    background-size: 400% 400%;
    animation: gradientBackground 5s infinite;
  }

  .estetik-background-RIASEC-header {
    background: linear-gradient(45deg, #242424, #7ED7C1);
    background-size: 400% 400%;
    animation: gradientBackground 10s infinite;
    color: white;
    padding: 10px;
    border-radius: 10px;
  }








  @keyframes gradientBackground {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  .continue-btn {
    cursor: pointer;

  }

  /* .small-text-scroll::-webkit-scrollbar {
    animation: scroll-animation 0.5s ease-in-out;
  } */

  .small-text-scroll {
    overflow-y: scroll;
    scrollbar-color: #fff #000;
    scrollbar-width: 10px;
  }

  .custom-scrollbar {
    overflow-y: scroll;
    scrollbar-color: #fff #000;
    scrollbar-width: 5px;

    scrollbar-track {
      background-color: #fff;
    }

    scrollbar-thumb {
      background-color: #000;
    }
  }

  @keyframes scroll-animation {
    0% {
      width: 0px;
    }

    100% {
      width: 10px;
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
            <i class="fa fa-pencil"></i>
          </button>
          <div class="step-title">
            Form Consultation
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="fa fa-refresh"></i>
          </button>
          <div class="step-title">
            Tes Kecerdasan
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <i class="fa fa-refresh"></i>
          </button>
          <div class="step-title">
            Tes Minat
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <i class="fa fa-trophy"></i>
          </button>
          <div class="step-title">
            Result
          </div>
        </div>
        <div class="step-item">
          <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            <i class="fa fa-book"></i>
          </button>
          <div class="step-title">
            LKPD
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
            <div class="row" id="guide_tes_kecerdasan">
              <div class="col">
                <center>TES KECERDASAN MAJEMUK</center>
                <br>
                <p class="text-muted">
                  Hai sobat karir! <br><br>
                  kamu masih bingung mengenai apa kelebihan mu? Atau kamu sedang penasaran karier masadepan yang cocok
                  untukmu? Atau sedang bingung cara belajar yang sesuai denganmu? Sobat, setiap manusia memiliki
                  kecerdasan
                  yang beragam loh, karena cerdas tidak terbatas pada satu bidang saja. Kamu bisa saja memiliki
                  kecerdasan
                  yang baik pada satu bidang spesifik, atau mungkin juga kamu memiliki potensi kecerdasan dalam beberapa
                  bidang sekaligus. <br>
                  Howard Gardner seorang ahli psikologi dari Harvard University, telah melakukan penelitian mendalam
                  bahwa
                  manusia setidaknya memiliki 8 macam kecerdasan. Yang berbeda satu sama lain. Yaitu kecerdasan
                  berbahasa,
                  logis – matematis, bayang ruang, olah tubuh, bermusik, menjalin hubungan dengan orang lain, memahami
                  diri,
                  dan lingkungan. Penasaran denga napa jenis kecerdasanmu? Yuk ikuti tesnya sobattt!! <br><br>

                  Petunjuk: <br>
                <ol>
                  <li>Dibutuhkan waktu sekitar 15-20 menit untuk memberikan respon semua pernyataan.</li>
                  <li>Isilah data dirimu dengan benar</li>
                  <li>Kamu hanya memiliki 1 (satu) kali kesempatan untuk memberikan respon masing-masing pernyataan</li>
                  <li>Bacalah setiap pernyataan secara perlahan dengan kondisi tenang, kemudian berikan respon yang
                    sesuai
                    dengan dirimu.</li>
                  <li>Tidak ada respon yang salah selama kamu jujur sesuai dengan dirimu.</li>
                </ol>
                </p>
              </div>
            </div>
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

            <div class="row ">
              <div class="col d-flex justify-content-center">
                <button type="button" class="btn btn-success" id="btn-submit"><i class="fa fa-arrow-right"></i>
                  Next Test</button>
              </div>
              <a href="#" class="dummy-tes-kecerdasan">dummy</a>
            </div>

          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingFour">

        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="card-body">
            <div class="row" id="guide_tes_minat">
              <div class="col">
                <center>Tes Minat – Riasec Holland</center>
                <br>
                <p class="text-muted">
                  Hai sobat karir! <br><br>
                  Kamu masih bingung apa minat pekerjaanmu? Kamu juga merasa cemas dan khawatir apabila kariermu nanti
                  tidak
                  sesuai dengan keterampilan dan kemampuanmu? Jangan khawatir ya sobatt! <br>
                  John L. Holland memperkenalkan teori karier yang menyatakan bahwa dalam memilih karir, orang lebih
                  suka
                  pekerjaan dimana mereka bisa berada disekitar orang lain yang seperti mereka. Mereka mencari
                  lingkungan
                  yang akan memungkinkan mereka menggunakan keterampilan dan kemampuan mereka. Model pilihan karier
                  Holland
                  menunjukan bahwa individu akan mencari pekerjaan yang sesuai dengan keterampilan, kemampuan, sikap,
                  dan
                  nilai mereka harus mendapat kesesuaian antara RIASEC dengan lingkungan. Holland membagi kepribadian
                  tersebut dalam enam tipe yaitu Realistic (R), Investigative (I), Artistik (A), Social (S),
                  Enterprising
                  (E). Yukk langsung ikuti tesnya sobatt!!<br><br>

                  Petunjuk: <br>
                <ol>
                  <li>Dibutuhkan waktu sekitar 15-20 menit untuk memberikan respon semua pernyataan.</li>
                  <li>Isilah data dirimu dengan benar</li>
                  <li>Kamu hanya memiliki 1 (satu) kali kesempatan untuk memberikan respon masing-masing pernyataan</li>
                  <li>Bacalah setiap pernyataan secara perlahan dengan kondisi tenang, kemudian berikan respon yang
                    sesuai
                    dengan dirimu.</li>
                  <li>Tidak ada respon yang salah selama kamu jujur sesuai dengan dirimu.</li>
                </ol>
                </p>
              </div>
            </div>
            <div class="row" id="start-4">
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
            <div id="tes-bakat">

            </div>
            <nav aria-label="Page navigation example" id="container-pagination-tes-bakat">
              <ul class="pagination justify-content-center" id="pagination-tes-bakat">
              </ul>
            </nav>

            <div class="row ">
              <div class="col d-flex justify-content-center">
                <button type="button" class="btn btn-success" id="btn-submit-bakat"><i class="fa fa-arrow-right"></i>
                  Next</button> <br>
              </div>
              <a href="#" class="dummy-tes-bakat">dummy</a>
            </div>

          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingSix"></div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
          <div class="card-body">
            <div id="LKPD_QUESTION_MASTER"></div>
            <div id="END_RESULT">
              <div class="row">
                <div class="d-flex col justify-content-center">
                  <button class="btn btn-sm btn-warning" id="btn_download_lkpd">
                    <i class="fa fa-download"></i> Download LKDP (PDF)
                  </button>
                  &nbsp;
                  <button class="btn btn-sm btn-danger" id="btn_print">
                    <i class="fa fa-download"></i> Download Hasil Tes (PDF)
                  </button>
                  &nbsp;
                  <button class="btn btn-sm btn-secondary" id="btn_ulang">
                    <i class="bi bi-arrow-counterclockwise"></i> Test Ulang
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-primary btn-sm" id="btn_save_lkpd"> <i class="fa fa-save"></i>
                    Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div id="headingFive"></div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="card-body">
            {{-- <div class="featured-body">
              <p>Before the floodplain restoration at Landis Homes was underway, residents were concerned about the view
                and asked for a planted screen to hide the wetland that was under construction. Now, they wouldn’t dream
                of hiding the wetland, now flourishing with new flora and fauna. Home to more than 700 residents, the
                Landis Homes retirement community in Lititz, Pennsylvania, needed additional living space to meet demand
                for an increasing number of retirees. Landis Homes and their land development consultant RGS Associates
                contacted LandStudies, Inc., a local landscape architect firm specializing in floodplain restoration and
                regional stormwater solutions, for help. The team felt that restoring the floodplain would not only
                provide an amenity for the community, but also improve water quality and provide a unique stormwater
                management solution for the development. Over the course of three months, the team designed a stream and
                floodplain restoration project that improved stream function, increased floodwater storage potential,
                and actively engaged residents to improve social interactions and overall community health. By utilizing
                the floodplain for stormwater management, land that would be typically set aside for conventional
                stormwater management basins was used to construct additional housing units, increasing the efficiency
                of the overall development.
              </p>
            </div> --}}
            <div class="row">
              <div class="d-flex col justify-content-end">
                <button class="btn btn-sm btn-warning" id="btn_print_lkpd">
                  <i class="fa fa-pencil"></i> LKDP
                </button>
                &nbsp;
                <button class="btn btn-sm btn-danger" id="btn_print" disabled>
                  <i class="fa fa-download"></i> PDF
                </button>
                &nbsp;
                <button class="btn btn-sm btn-secondary" id="btn_ulang">
                  <i class="bi bi-arrow-counterclockwise"></i> Test Ulang
                </button>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col d-flex justify-content-center">
                <button class="btn btn-warning" id="get_result">
                  <i class="fa fa-circle" id="get_result_icon"></i>
                  Get Result
                </button>

              </div>
            </div>

            <div class="row mt-5" id="bodyTestResult">

            </div>
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
  var showChar = 1200;   // Set a char limit
	var ellipses = "<span id='ellip'>...</span>";
	var button = "<span class='continue-btn text-primary' id='act'>Show more</span>";
	var pcount = $('.featured-body p:first').text().length;  // get paragraph char count

	if(pcount > showChar){
	   // split the paragraph in two
	   var first_half  = $('.featured-body p').text().slice(0,200);
	   var second_half = $('.featured-body p').text().slice(200,pcount);
	  // erase the current paragraph text
	  $('.featured-body p:first').text("");
	 // Append the first and second halves, with new <div> classes, using :first because the button tag is wrapped in p, as it should be with HTML5
	  $('.featured-body p:first').append("<span class='first'>"+first_half+ellipses+"</span>");
	  $('.featured-body p:first').append("<span class='second'>"+second_half+"</span>");
	  $('.featured-body p:first').append(button);
	 // Hide second half
	 $('.second').hide();

	}

	$('#act').on('click',function(){ 
	   // Toggle the second half on or off
	   $('.second').toggle();
	   $('#ellip').toggle();
	  // Change the button text
	  if($(this).text() == "Show more"){
	     $(this).text("Show Less")
	  }else{
	    $(this).text("Show more");
	  }
	}); 
</script>
{{-- variable --}}
<script>
  // var codeTest from $codeTest
  var codeTest = "{{ $codeTest }}";
  var step = "{{ $step }}";


  var dataDummyTesBakat = [{"indikator_id":"74","indikator_res":"SS","value":"4"},{"indikator_id":"75","indikator_res":"TS","value":"2"},{"indikator_id":"76","indikator_res":"S","value":"3"},{"indikator_id":"77","indikator_res":"TS","value":"2"},{"indikator_id":"78","indikator_res":"S","value":"3"},{"indikator_id":"79","indikator_res":"S","value":"3"},{"indikator_id":"80","indikator_res":"TS","value":"2"},{"indikator_id":"81","indikator_res":"S","value":"3"},{"indikator_id":"82","indikator_res":"TS","value":"2"},{"indikator_id":"83","indikator_res":"S","value":"3"},{"indikator_id":"84","indikator_res":"S","value":"3"},{"indikator_id":"85","indikator_res":"TS","value":"2"},{"indikator_id":"86","indikator_res":"S","value":"3"},{"indikator_id":"87","indikator_res":"S","value":"3"},{"indikator_id":"88","indikator_res":"TS","value":"2"},{"indikator_id":"89","indikator_res":"S","value":"3"},{"indikator_id":"90","indikator_res":"TS","value":"2"},{"indikator_id":"91","indikator_res":"S","value":"3"},{"indikator_id":"92","indikator_res":"TS","value":"2"},{"indikator_id":"93","indikator_res":"S","value":"3"},{"indikator_id":"94","indikator_res":"S","value":"3"},{"indikator_id":"95","indikator_res":"S","value":"3"},{"indikator_id":"96","indikator_res":"TS","value":"2"},{"indikator_id":"97","indikator_res":"S","value":"3"},{"indikator_id":"98","indikator_res":"TS","value":"2"},{"indikator_id":"99","indikator_res":"S","value":"3"},{"indikator_id":"100","indikator_res":"TS","value":"2"},{"indikator_id":"101","indikator_res":"S","value":"3"},{"indikator_id":"102","indikator_res":"TS","value":"2"},{"indikator_id":"103","indikator_res":"S","value":"3"},{"indikator_id":"104","indikator_res":"SS","value":"4"},{"indikator_id":"105","indikator_res":"S","value":"3"},{"indikator_id":"106","indikator_res":"TS","value":"2"},{"indikator_id":"107","indikator_res":"S","value":"3"},{"indikator_id":"108","indikator_res":"TS","value":"2"},{"indikator_id":"109","indikator_res":"S","value":"3"},{"indikator_id":"110","indikator_res":"TS","value":"2"},{"indikator_id":"111","indikator_res":"S","value":"3"},{"indikator_id":"112","indikator_res":"TS","value":"2"},{"indikator_id":"113","indikator_res":"S","value":"3"},{"indikator_id":"114","indikator_res":"S","value":"3"},{"indikator_id":"115","indikator_res":"TS","value":"2"},{"indikator_id":"116","indikator_res":"S","value":"3"},{"indikator_id":"117","indikator_res":"S","value":"3"},{"indikator_id":"118","indikator_res":"TS","value":"2"},{"indikator_id":"119","indikator_res":"S","value":"3"},{"indikator_id":"120","indikator_res":"TS","value":"2"},{"indikator_id":"121","indikator_res":"TS","value":"2"},{"indikator_id":"122","indikator_res":"S","value":"3"},{"indikator_id":"123","indikator_res":"TS","value":"2"},{"indikator_id":"124","indikator_res":"SS","value":"4"},{"indikator_id":"125","indikator_res":"S","value":"3"},{"indikator_id":"126","indikator_res":"TS","value":"2"},{"indikator_id":"127","indikator_res":"S","value":"3"},{"indikator_id":"128","indikator_res":"S","value":"3"},{"indikator_id":"129","indikator_res":"S","value":"3"},{"indikator_id":"130","indikator_res":"S","value":"3"},{"indikator_id":"131","indikator_res":"TS","value":"2"},{"indikator_id":"132","indikator_res":"S","value":"3"},{"indikator_id":"133","indikator_res":"TS","value":"2"}];

  var dataDummyTesKecerdasan = [{"indikator_id":"1","indikator_res":"SS","value":"4"},{"indikator_id":"2","indikator_res":"S","value":"3"},{"indikator_id":"3","indikator_res":"TS","value":"2"},{"indikator_id":"4","indikator_res":"S","value":"3"},{"indikator_id":"5","indikator_res":"S","value":"3"},{"indikator_id":"6","indikator_res":"SS","value":"4"},{"indikator_id":"7","indikator_res":"S","value":"3"},{"indikator_id":"8","indikator_res":"S","value":"3"},{"indikator_id":"9","indikator_res":"TS","value":"2"},{"indikator_id":"10","indikator_res":"S","value":"3"},{"indikator_id":"11","indikator_res":"S","value":"3"},{"indikator_id":"12","indikator_res":"SS","value":"4"},{"indikator_id":"13","indikator_res":"S","value":"3"},{"indikator_id":"14","indikator_res":"S","value":"3"},{"indikator_id":"15","indikator_res":"S","value":"3"},{"indikator_id":"16","indikator_res":"S","value":"3"},{"indikator_id":"17","indikator_res":"TS","value":"2"},{"indikator_id":"18","indikator_res":"S","value":"3"},{"indikator_id":"19","indikator_res":"TS","value":"2"},{"indikator_id":"20","indikator_res":"S","value":"3"},{"indikator_id":"21","indikator_res":"S","value":"3"},{"indikator_id":"22","indikator_res":"S","value":"3"},{"indikator_id":"23","indikator_res":"S","value":"3"},{"indikator_id":"24","indikator_res":"S","value":"3"},{"indikator_id":"25","indikator_res":"S","value":"3"},{"indikator_id":"26","indikator_res":"TS","value":"2"},{"indikator_id":"27","indikator_res":"S","value":"3"},{"indikator_id":"28","indikator_res":"S","value":"3"},{"indikator_id":"29","indikator_res":"TS","value":"2"},{"indikator_id":"30","indikator_res":"S","value":"3"},{"indikator_id":"31","indikator_res":"S","value":"3"},{"indikator_id":"32","indikator_res":"S","value":"3"},{"indikator_id":"33","indikator_res":"TS","value":"2"},{"indikator_id":"34","indikator_res":"S","value":"3"},{"indikator_id":"35","indikator_res":"TS","value":"2"},{"indikator_id":"36","indikator_res":"S","value":"3"},{"indikator_id":"37","indikator_res":"TS","value":"2"},{"indikator_id":"38","indikator_res":"S","value":"3"},{"indikator_id":"39","indikator_res":"TS","value":"2"},{"indikator_id":"40","indikator_res":"S","value":"3"},{"indikator_id":"41","indikator_res":"SS","value":"4"},{"indikator_id":"42","indikator_res":"SS","value":"4"},{"indikator_id":"43","indikator_res":"S","value":"3"},{"indikator_id":"44","indikator_res":"TS","value":"2"},{"indikator_id":"45","indikator_res":"S","value":"3"},{"indikator_id":"46","indikator_res":"S","value":"3"},{"indikator_id":"47","indikator_res":"TS","value":"2"},{"indikator_id":"48","indikator_res":"S","value":"3"},{"indikator_id":"49","indikator_res":"TS","value":"2"},{"indikator_id":"50","indikator_res":"S","value":"3"},{"indikator_id":"51","indikator_res":"SS","value":"4"},{"indikator_id":"52","indikator_res":"S","value":"3"},{"indikator_id":"53","indikator_res":"TS","value":"2"},{"indikator_id":"54","indikator_res":"S","value":"3"},{"indikator_id":"55","indikator_res":"TS","value":"2"},{"indikator_id":"56","indikator_res":"S","value":"3"},{"indikator_id":"57","indikator_res":"TS","value":"2"},{"indikator_id":"58","indikator_res":"SS","value":"4"},{"indikator_id":"59","indikator_res":"S","value":"3"},{"indikator_id":"60","indikator_res":"S","value":"3"},{"indikator_id":"61","indikator_res":"SS","value":"4"},{"indikator_id":"62","indikator_res":"S","value":"3"},{"indikator_id":"63","indikator_res":"TS","value":"2"},{"indikator_id":"64","indikator_res":"S","value":"3"},{"indikator_id":"65","indikator_res":"TS","value":"2"},{"indikator_id":"66","indikator_res":"S","value":"3"},{"indikator_id":"67","indikator_res":"S","value":"3"},{"indikator_id":"68","indikator_res":"S","value":"3"},{"indikator_id":"69","indikator_res":"TS","value":"2"},{"indikator_id":"70","indikator_res":"S","value":"3"},{"indikator_id":"71","indikator_res":"S","value":"3"},{"indikator_id":"72","indikator_res":"TS","value":"2"},{"indikator_id":"134","indikator_res":"S","value":"3"},{"indikator_id":"73","indikator_res":"TS","value":"2"},{"indikator_id":"135","indikator_res":"S","value":"3"},{"indikator_id":"136","indikator_res":"S","value":"3"},{"indikator_id":"137","indikator_res":"S","value":"3"},{"indikator_id":"138","indikator_res":"TS","value":"2"},{"indikator_id":"139","indikator_res":"S","value":"3"},{"indikator_id":"140","indikator_res":"TS","value":"2"},{"indikator_id":"141","indikator_res":"S","value":"3"},{"indikator_id":"142","indikator_res":"TS","value":"2"},{"indikator_id":"143","indikator_res":"TS","value":"2"},{"indikator_id":"144","indikator_res":"S","value":"3"},{"indikator_id":"145","indikator_res":"S","value":"3"},{"indikator_id":"146","indikator_res":"TS","value":"2"},{"indikator_id":"147","indikator_res":"S","value":"3"},{"indikator_id":"148","indikator_res":"S","value":"3"},{"indikator_id":"149","indikator_res":"TS","value":"2"},{"indikator_id":"150","indikator_res":"S","value":"3"}];

  const stepButtons = document.querySelectorAll('.step-button');
  var dataOption = [];
  var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan') ?? null;
  var start_3 = $('#start-3');
  var start_4 = $('#start-4');
  var guide_tes_kecerdasan = $('#guide_tes_kecerdasan');
  var guide_tes_minat = $('#guide_tes_minat');
  var tes_bakat = $('#tes-bakat');
  var tes_kecerdasan = $('#tes-kecerdasan');
  var collapseOne = $('#collapseOne');
    var collapseTwo = $('#collapseTwo');
    var collapseThree = $('#collapseThree');
    var collapseFour = $('#collapseFour');
    var collapseFive = $('#collapseFive');
    var collapseSix = $('#collapseSix');
    var btnCollapseOne = $('button[data-bs-target="#collapseOne"]');
    var btnCollapseTwo = $('button[data-bs-target="#collapseTwo"]');
    var btnCollapseThree = $('button[data-bs-target="#collapseThree"]');
    var btnCollapseFour = $('button[data-bs-target="#collapseFour"]');
    var btnCollapseFive = $('button[data-bs-target="#collapseFive"]');
    var btnCollapseSix = $('button[data-bs-target="#collapseSix"]');
    var progress = $('#progress');
    var btn_submit = $('#btn-submit');
    var btn_submit_bakat = $('#btn-submit-bakat');
    var next_1 = $('#next-1');
    var get_result = $('#get_result');
    var container_pagination_tes_kecerdasan = $('#container-pagination-tes-kecerdasan');
    var container_pagination_tes_bakat = $('#container-pagination-tes-bakat');

    var LKPD_QUESTION_MASTER = $('#LKPD_QUESTION_MASTER');
    var btn_download_lkpd = $('#btn_download_lkpd');
    var btn_print_lkpd = $('#btn_print_lkpd');
    var btn_save_lkpd = $('#btn_save_lkpd');

    var get_result = $('#get_result');
    var get_result_icon = $('#get_result_icon');

    var btn_ulang = $('#btn_ulang');
    var btn_print = $('#btn_print');

    var END_RESULT = $('#END_RESULT');

    var progress_status = [0, 34, 60, 80, 100];
</script>

{{-- script for step --}}
<script>
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
{{-- consultation and validation --}}
<script>
  $(document).ready(function () {
    localStorage.setItem('step', step);

    $('.dummy-tes-kecerdasan').on('click',function(){
      var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
      localStorage.setItem('dataTestKecerdasan', JSON.stringify(dataDummyTesKecerdasan));
      
     // wait 1 sec
     setTimeout(function(){
        window.location.reload();
      }, 1000);
    })

    $('.dummy-tes-bakat').on('click',function(){
      var dataTestbakat = localStorage.getItem('dataTestbakat');
      localStorage.setItem('dataTestbakat', JSON.stringify(dataDummyTesBakat));
      
      // wait 1 sec
      setTimeout(function(){
        window.location.reload();
      }, 1000);
    })

    switchBtn(false);

    switch (step) {
      case '1':
        collapseOne.collapse('show');
        btnCollapseOne.addClass('done');
        progress.val(progress_status[0]);
        break;
      case '2':
        // collapseOne.collapse('hide');
        // collapseTwo.collapse('show');
        // btnCollapseOne.addClass('done');
        // btnCollapseTwo.addClass('done');
        // progress.val(34);
        break;
      case '3':
        collapseOne.collapse('hide');
        collapseTwo.collapse('hide');
        collapseThree.collapse('show');
        btnCollapseOne.addClass('done');
        btnCollapseTwo.addClass('done');
        btnCollapseThree.addClass('done');
        progress.val(progress_status[1]);
        break;
      case '4':
        collapseOne.collapse('hide');
        collapseTwo.collapse('hide');
        collapseThree.collapse('hide');
        collapseFour.collapse('show');
        btnCollapseOne.addClass('done');
        btnCollapseTwo.addClass('done');
        btnCollapseThree.addClass('done');
        btnCollapseFour.addClass('done');
        progress.val(progress_status[2]);
        break;
      case '5':
        collapseOne.collapse('hide');
        collapseTwo.collapse('hide');
        collapseThree.collapse('hide');
        collapseFour.collapse('hide');
        collapseSix.collapse('hide');
        collapseFive.collapse('show');
        btnCollapseOne.addClass('done');
        btnCollapseTwo.addClass('done');
        btnCollapseThree.addClass('done');
        btnCollapseFour.addClass('done');
        btnCollapseFive.addClass('done');
        btnCollapseSix.addClass('done');
        progress.val(progress_status[4]);
        break;
      case '6':
        collapseOne.collapse('hide');
        collapseTwo.collapse('hide');
        collapseThree.collapse('hide');
        collapseFour.collapse('hide');
        collapseFive.collapse('hide');
        collapseSix.collapse('show');
        btnCollapseOne.addClass('done');
        btnCollapseTwo.addClass('done');
        btnCollapseThree.addClass('done');
        btnCollapseFour.addClass('done');
        btnCollapseFive.addClass('done');
        btnCollapseSix.addClass('done');
        
        checkCodeTestInLKPD();
        progress.val(progress_status[4]);
      break;
      case '10':
        collapseOne.collapse('hide');
        collapseTwo.collapse('hide');
        collapseThree.collapse('hide');
        collapseFour.collapse('hide');
        // collapseSix.collapse('hide');
        collapseFive.collapse('show');
        btnCollapseOne.addClass('done');
        btnCollapseTwo.addClass('done');
        btnCollapseThree.addClass('done');
        btnCollapseFour.addClass('done');
        btnCollapseFive.addClass('done');
        // btnCollapseSix.addClass('done');
        progress.val(progress_status[3]);

        // hide button get result
        // get_result.prop('disabled', true);

        var status_result = localStorage.getItem('get_result');

        switchBtn(true);
        // load result
        loadResult();

        btn_print_lkpd.prop('disabled', true);
        btn_print.prop('disabled', true);

        if(status_result == '1'){
          get_result.prop('disabled', true);
          btn_print_lkpd.prop('disabled', false);

          //wait 1 sec
          setTimeout(function(){
            btn_print.prop('disabled', false);
          }, 1000);

          // btn_print.prop('disabled', false);
        }
        break;
      default:
        collapseOne.collapse('show');
        get_result.prop('disabled', false);
        break;
    }
    
    const collapseButtons = [btnCollapseOne, btnCollapseTwo, btnCollapseThree, btnCollapseFour, btnCollapseFive, btnCollapseSix];
    collapseButtons.forEach(button => button.prop('disabled', true));


    updateDataConsultation();
    validation1()
    // setiap inputan selesai di isi
    $('#name, #date, #education, #email').on('blur', function() 
    {
      updateDataConsultation();
    });
      

      next_1.click(function () {
        next1();
      });


      btn_submit.click(function () {
        progress.val(progress_status[3]);
        var totalIndikator = localStorage.getItem('totalIndikator_kecerdasan');
        var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
        var dataTestKecerdasanTemp = (dataTestKecerdasan != null) ? JSON.parse(dataTestKecerdasan) : [];

        if(dataTestKecerdasanTemp.length != totalIndikator){
          toastr.error('Tes Bakat Belum Selesai');
          
          // balik ke collapseThree
          collapseThree.collapse('show');
          
          // hilanhkan done pada collapseFour
          collapseFour.removeClass('done');
          
          // progress bar
          progress.val(progress_status[2]);
        }

        collapseThree.collapse('hide');
        collapseFour.collapse('show');

        // beri class "done" pada button yang mempunyai data-bs-target = collapseThree
        btnCollapseThree.addClass('done');
        btnCollapseFour.addClass('done');

        updateStep(codeTest,4);

      });

      btn_submit_bakat.click(function () {
        progress.val(progress_status[3]);
        var totalIndikator_bakat = localStorage.getItem('totalIndikator_bakat') ?? 0;
        var dataTestbakat = localStorage.getItem('dataTestbakat') ?? null;
        var dataTestbakatTemp = (dataTestbakat != null) ? JSON.parse(dataTestbakat) : [];

        var totalIndikator = localStorage.getItem('totalIndikator_kecerdasan');
        var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
        var dataTestKecerdasanTemp = (dataTestKecerdasan != null) ? JSON.parse(dataTestKecerdasan) : [];

        if(dataTestKecerdasanTemp.length != totalIndikator){
          toastr.error('Tes Kecerdasan Belum Selesai');
          
          // balik ke collapseThree
          collapseThree.collapse('show');

          // hilanhkan done pada collapseFour
          // $('button[data-bs-target="#collapseFour"],button[data-bs-target="#collapseFive"]').removeClass('done');
          btnCollapseFour.removeClass('done');
          btnCollapseSix.removeClass('done');
          

          // progress bar
          progress.val(progress_status[2]);
          return false;
        }

        if(dataTestbakatTemp.length != totalIndikator_bakat){
          toastr.error('Tes Bakat Belum Selesai');
          
          // balik ke collapseThree
          collapseFour.collapse('show');
          collapseSix.collapse('hide');

          // hilanhkan done pada collapseFour
          btnCollapseSix.removeClass('done');

          // progress bar
          progress.val(progress_status[2]);
          return false;
        }

        collapseFour.collapse('hide');
        // collapseSix.collapse('show');
        collapseFive.collapse('show');

        // beri class "done" pada button yang mempunyai data-bs-target = collapseThree
        btnCollapseFour.addClass('done');
        // btnCollapseSix.addClass('done');
        btnCollapseFive.addClass('done');

        // updateStep(codeTest,6);
        updateStep(codeTest,10); // step result

        // wait 1 sec
        setTimeout(function(){
          window.location.href = "{{ url('consultation') }}/"+codeTest;
        }, 1000);
      });

  });

  


  function next1() {
    // tombol save and next step 1 di klik
          updateDataConsultation();

          if(!validation1()){
            return false;
          }

          // toastr.success('Data Berhasil Disimpan');

          // beri class "done" pada button yang mempunyai data-bs-target = collapseOne 
          btnCollapseOne.addClass('done');

          // collapseThree show
          collapseThree.collapse('show');

          // progress bar
          progress.val(34);

          // beri class "done" pada button yang mempunyai data-bs-target = collapseThree
          btnCollapseOne.addClass('done');
          
          updateStep(codeTest,3);
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
                  $('button[data-bs-target="#collapseThree"],button[data-bs-target="#collapseFour"]').removeClass('done');
    
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

{{-- tes kecedasan --}}
<script>
  $(document).ready(function () {
    toggleButtonSubmit_kecerdasan();
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

    tes_kecerdasan.hide();
    container_pagination_tes_kecerdasan.hide();


    if(dataTestKecerdasan != null){
      tes_kecerdasan.show();
      container_pagination_tes_kecerdasan.show();

      start_3.hide();
      guide_tes_kecerdasan.hide();


      fillTestKecerdasan(1)
    }


    start_3.click(function () {
      tes_kecerdasan.show();
      container_pagination_tes_kecerdasan.show();

      start_3.hide();
      guide_tes_kecerdasan.hide();

      fillTestKecerdasan(1)

      toggleButtonSubmit_kecerdasan();
    });

    // trigger ketika form-check-input di click maka console.log semua isinya
    $(document).on('click', '.option-kecerdasan', function () {
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
      console.log(res)
      
      // update atau insert ke local storage
      updateDataTestKecerdasan(res);

      toggleButtonSubmit_kecerdasan();
    });
  });

  // 
  function toggleButtonSubmit_kecerdasan(){
    var totalIndikator = localStorage.getItem('totalIndikator_kecerdasan');
    var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
    var dataTestKecerdasanTemp = (dataTestKecerdasan != null) ? JSON.parse(dataTestKecerdasan) : [];

    if(dataTestKecerdasanTemp.length == totalIndikator){
      $('#btn-submit').prop('disabled', false);
    }else{
      $('#btn-submit').prop('disabled', true);
    }
  }

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

  // load pertanyaan
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
        let total = result.data.total;

        localStorage.setItem('totalIndikator_kecerdasan', total);
        
        if(success == true){
          let html = '';
          
          data.forEach(function(item,index){
            html += stringTemplateIndikator(item,dataOption);
          });

          fillPaginationTestKecerdasan(linksPagination);

          tes_kecerdasan.html(html);
          
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
    let dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
    let dataTestKecerdasanTemp = JSON.parse(dataTestKecerdasan);
    let temp = (dataTestKecerdasanTemp !=null) ? dataTestKecerdasanTemp.find(x => x.indikator_id == indikator_id) : undefined;
    
    option.forEach(function(item,index){
       let active = (temp != undefined && temp.indikator_res == item.CODE) ? 'checked' : '';

        optionHtml+= `<div class="form-check form-check-inline">
                        <input class="form-check-input option-kecerdasan" type="radio" name="indikator_${indikator_id}" id="${indikator_id}_${item.CODE}" value="${item.POINT}" ${active}>
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

{{-- tes bakat --}}
<script>
  var dataOption = [];
  var dataTestbakat = localStorage.getItem('dataTestbakat') ?? null;

  $(document).ready(function () {
    toggleButtonSubmit_bakat();
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

    tes_bakat.hide();
    container_pagination_tes_bakat.hide();


    if(dataTestbakat != null){
      tes_bakat.show();
      container_pagination_tes_bakat.show();

      start_4.hide();
      guide_tes_minat.hide();

      fillTestbakat(1)
    }


    start_4.click(function () {
      tes_bakat.show();
      container_pagination_tes_bakat.show();

      start_4.hide();
      guide_tes_minat.hide();

      fillTestbakat(1)

      toggleButtonSubmit_bakat();
    });

    // trigger ketika form-check-input di click maka console.log semua isinya
    $(document).on('click', '.option-bakat', function () {
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
      updateDataTestbakat(res);

      toggleButtonSubmit_bakat();
    });
  });

  // 
  function toggleButtonSubmit_bakat(){
    var totalIndikator = localStorage.getItem('totalIndikator_bakat') ?? 0;
    var dataTestbakat = localStorage.getItem('dataTestbakat') ?? null;
    var dataTestbakatTemp = (dataTestbakat != null) ? JSON.parse(dataTestbakat) : [];

    if(dataTestbakatTemp.length == totalIndikator){
      btn_submit_bakat.prop('disabled', false);
    }else{
      btn_submit_bakat.prop('disabled', true);
    }
  }

  function updateDataTestbakat(res){
    var storage = localStorage.getItem('dataTestbakat');
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

    localStorage.setItem('dataTestbakat', JSON.stringify(data));
  }

  // load pertanyaan
  function fillTestbakat(page){
    var url = "{{ url('api/indikator/2') }}";
    
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
        let total = result.data.total;

        localStorage.setItem('totalIndikator_bakat', total);
        
        if(success == true){
          let html = '';
          
          data.forEach(function(item,index){
            html += stringTemplateIndikator_bakat(item,dataOption);
          });

          fillPaginationTestbakat(linksPagination);

          $('#tes-bakat').html(html);
          
        }else{
          console.log(message)
        }
      }
    });
  }

  function fillPaginationTestbakat(links){

    let html = '';

    links.forEach(function(item,index){
      // hanya angka
      if(item.label != '&laquo; Previous' && item.label != 'Next &raquo;'){
        let page = item.label;
        let active = (item.active) ? 'active' : '';
        html += `<li class="page-item ${active}"><a class="page-link" href="#" onclick="fillTestbakat(${page})">${page}</a></li>`;
      }
    })

    $('#pagination-tes-bakat').html(html);
  }

  function stringTemplateIndikator_bakat(indikator,option){

    let optionHtml = '';
    let indikator_id = indikator.ID;
    let row_number = indikator.row_number;
    let indikator_desc = indikator.INDIKATOR;

    // cek di dataTestbakat berdasaarkan indikator_id, jika ada maka active
    let dataTestbakatTemp = JSON.parse(dataTestbakat);
    
    let temp = (dataTestbakatTemp !=null) ? dataTestbakatTemp.find(x => x.indikator_id == indikator_id) : undefined;

    option.forEach(function(item,index){
       let active = (temp != undefined && temp.indikator_res == item.CODE) ? 'checked' : '';

        optionHtml+= `<div class="form-check form-check-inline">
                        <input class="form-check-input option-bakat" type="radio" name="indikator_${indikator_id}" id="${indikator_id}_${item.CODE}" value="${item.POINT}" ${active}>
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

{{-- feedback LKPD --}}
<script>
  $(document).ready(function () {
    getQuestionLKPD()

   
  });

  btn_save_lkpd.click(function(){
      var data = [];
      var dataLKPD = $('.LKPD_ANSWERS');

      // validasi jangan ada yang kosong
      var is_empty = false;

      dataLKPD.each(function(index,item){
        var id = $(this).attr('id');
        id = id.split('_')[1];
        var value = $(this).val();

        if(value == ''){
          is_empty = true;
        }

        var temp = {
          'QUESTION_ID' : id,
          'ANSWER' : value
        }

        data.push(temp);
      });

      if(is_empty){
        toastr.error('Data LKPD Tidak Boleh Kosong');
        return false;
      }

      var dataLKPD = JSON.stringify(data);

      var data = {
        'codeTest' : codeTest,
        'dataLKPD' : dataLKPD
      }

      $.ajax({
        url: "{{ url('api/lkpd/saveAnswer') }}",
        type: "POST",
        data : data,
        success: function(result){
          if(result.success == true){
            toastr.success(result.message);
            // updateStep(codeTest,5);
            LKPD_QUESTION_MASTER.hide();
            END_RESULT.show();


            window.location.reload();
          }else{
            toastr.error(result.message);
          }
        }
      });
  });

  function getQuestionLKPD(){
    var url = "{{ url('api/lkpd/') }}";
    
    $.ajax({
      url: url,
      type: "GET",
      success: function(result){
        let message = result.message;
        let data = result.data;
        let success = result.success;
        
        if(success == true){
          let html = '';
          
          data.forEach(function(item,index){
            html += LKPDStringTemplate(item);
          });

          LKPD_QUESTION_MASTER.html(html);
          
        }else{
          console.log(message)
        }
      }
    });
  }

  function LKPDStringTemplate(data){
    var html = `<div class="row mb-3">
              <div class="col">
                <div class="form-group">
                  <label for="">
                    <p>${data.NO}. ${data.QUESTION}<sup><small>*</small></sup></p>
                  </label>
                  <textarea class="form-control LKPD_ANSWERS" id="LKPD_${data.ID}" rows="3"></textarea>
                </div>
              </div>
            </div>`;

    return html;
  }

  function checkCodeTestInLKPD(){
    var data = {
      'codeTest' : codeTest
    }

    $.ajax({
      url: "{{ url('api/lkpd/checkCodeTest') }}",
      type: "POST",
      data : data,
      success: function(result){
        console.log(result);
        if(result.success == true){
          if(result.data == true){
            LKPD_QUESTION_MASTER.hide();
            END_RESULT.show();
            btn_save_lkpd.hide();

            btn_print.prop('disabled', false);
          }else{
            LKPD_QUESTION_MASTER.show();
            END_RESULT.hide();
            btn_save_lkpd.show();

            btn_print.prop('disabled', true);
          }
        }else{
          toastr.error(result.message);
        }
      }
    });
  }
</script>

<script>
  get_result.on('click',function(){
    

    get_result_icon.removeClass('fa-circle');
    get_result_icon.addClass('fa-spinner fa-spin');

    // validasi apakah total indikator kecerdasan dan bakat sudah terisi semua
    var totalIndikator_kecerdasan = localStorage.getItem('totalIndikator_kecerdasan');
    var totalIndikator_bakat = localStorage.getItem('totalIndikator_bakat');
    var dataTestKecerdasan = localStorage.getItem('dataTestKecerdasan');
    var dataTestbakat = localStorage.getItem('dataTestbakat');

    // object to array
    var dataTestKecerdasanTemp = JSON.parse(dataTestKecerdasan);
    var dataTestbakatTemp = JSON.parse(dataTestbakat);

    if(dataTestKecerdasanTemp.length != totalIndikator_kecerdasan){

      get_result_icon.removeClass('fa-spinner fa-spin');
      get_result_icon.addClass('fa-circle');

      toastr.error('Data Tes Kecerdasan Belum Lengkap');
      return false;
    }

    if(dataTestbakatTemp.length != totalIndikator_bakat){
      get_result_icon.removeClass('fa-spinner fa-spin');
      get_result_icon.addClass('fa-circle');
      toastr.error('Data Tes Bakat Belum Lengkap');
      return false;
    }

    let data = {
      'dataTestKecerdasan' : dataTestKecerdasan,
      'dataTestBakat' : dataTestbakat,
      'dataForm' : localStorage.getItem('data'),
      'codeTest' : codeTest
    }

    $.ajax({
      url: "{{ url('api/report/getResult') }}",
      type: "POST",
      data : data,
      success: function(result){
        get_result_icon.removeClass('fa-spinner fa-spin');
        get_result_icon.addClass('fa-circle');
       if(result.success == true){
          // hide #get_result
          get_result.prop('disabled', true);

          localStorage.setItem('get_result',1);

          localStorage.removeItem('dataTestKecerdasan');
          localStorage.removeItem('dataTestbakat');
          localStorage.removeItem('totalIndikator_bakat');
          localStorage.removeItem('totalIndikator_kecerdasan');
          localStorage.removeItem('errNumber');
          localStorage.removeItem('data');

          updateStep(codeTest,10);

          // wait for 1 second
          setTimeout(function(){
            window.location.reload();
          },1000);

          // localStorage.setItem('codeTest', result.data.codeTest);

          
        }else{
          get_result.prop('disabled', false);
          toastr.error(result.message);
        }
          
      }
    });

    get_result_icon.removeClass('fa-spinner fa-spin');
    get_result_icon.addClass('fa-circle');
  })

  function loadResult(){

    // var codeTest = getLastCodeTestByUserId({{ Auth::user()->id }});

    if(codeTest != '' || codeTest != null)
    {
      // localStorage.setItem('codeTest', codeTest);
      var data = {
        'codeTest' : codeTest
      }

      $.ajax({
        url: "{{ url('api/report/getResultByCodeTest') }}",
        type: "POST",
        data : data,
        success: function(result){
        if(result.success == true){

            updateStep(codeTest,10);
            resultInterface(result.data);
            // localStorage.setItem('codeTest', result.data.codeTest);

        }else{
            toastr.error(result.message);
        }
        }
      });
    }
  };

  function switchBtn($status = false){
    if($status == true){
      btn_print.prop('disabled', false);
      btn_print_lkpd.prop('disabled', false);
      // btn_ulang.prop('disabled', false);
    }else{
      btn_print.prop('disabled', true);
      btn_print_lkpd.prop('disabled', true);
      // btn_ulang.prop('disabled', true);
    }
  }

  // btn_print.on('click',function(){
  //   $.ajax({
  //     url: "{{ url('api/report/downloadReportWithDomPDFByHTML') }}",
  //     type: "POST",
  //     data : {
  //       'codeTest' : codeTest
  //     },
  //     success: function(result){
  //       if(result.success == true){
  //         toastr.success(result.message);
  //       }else{
  //         toastr.error(result.message);
  //       }
  //     }
  //   });
  // })

  btn_print.on('click',function(){
    $.ajax({
        url: "{{ url('api/report/downloadReportWithDomPDFByHTML') }}",
        type: "POST",
        data: {
            'codeTest': codeTest
        },
        success: function(response){
            if(response.download_link){
                // Jika berhasil, tampilkan pesan sukses dan buat tautan unduhan
                toastr.success("Laporan berhasil di-generate. Silakan unduh.");
                // Buat elemen tautan unduhan
                var downloadLink = document.createElement('a');
                downloadLink.href = response.download_link;
                // downloadLink.click();

                window.open(response.download_link, '_blank');
            } else {
                // Jika gagal, tampilkan pesan error
                toastr.error("Gagal meng-generate laporan.");
            }
        },
        error: function(xhr, status, error){
            // Tangani kesalahan
            toastr.error("Terjadi kesalahan saat memproses permintaan.");
            console.error(xhr.responseText);
        }
    });
});


  btn_print_lkpd.on('click',function(){
    updateStep(codeTest,6);

    // wait for 1 second
    setTimeout(function(){
      window.location.reload();
    },1000);
  })

  btn_download_lkpd.on('click',function(){
    downloadLKPD();
  })

  // function downloadLKPD(){
  //   $.ajax({
  //     url: "{{ url('api/report/downloadResultLkdp') }}",
  //     type: "POST",
  //     data : {
  //       'codeTest' : codeTest
  //     },
  //     success: function(result){
  //       if(result.success == true){
  //         toastr.success(result.message);
  //       }else{
  //         toastr.error(result.message);
  //       }
  //     }
  //   });
  // }

  function downloadLKPD(){
    $.ajax({
        url: "{{ url('api/report/downloadResultLkdp') }}",
        type: "POST",
        data: {
            'codeTest': codeTest
        },
        success: function(response){
            if(response.download_link){
                // Jika berhasil, tampilkan pesan sukses dan buat tautan unduhan
                toastr.success("Laporan LKPD berhasil di-generate. Silakan unduh.");
                // Buat elemen tautan unduhan
                var downloadLink = document.createElement('a');
                downloadLink.href = response.download_link;
                // downloadLink.download = 'laporan_lkpd.pdf';
                // downloadLink.click();

                // open new tab
                window.open(response.download_link, '_blank');
            } else {
                // Jika gagal, tampilkan pesan error
                toastr.error("Gagal meng-generate laporan LKPD.");
            }
        },
        error: function(xhr, status, error){
            // Tangani kesalahan
            toastr.error("Terjadi kesalahan saat memproses permintaan.");
            console.error(xhr.responseText);
        }
    });
}


  btn_ulang.on('click',function(){

    // get to /api/report/generateCodeTest
    $.ajax({
      url: "{{ url('api/report/generateCodeTest') }}",
      type: "GET",
      success: function(result){
        if(result.success == true){
          localStorage.removeItem('dataTestKecerdasan');
          localStorage.removeItem('dataTestbakat');
          localStorage.removeItem('totalIndikator_bakat');
          localStorage.removeItem('totalIndikator_kecerdasan');
          localStorage.removeItem('errNumber');
          localStorage.removeItem('data');
          localStorage.removeItem('get_result');


          updateStep(codeTest,1);
          localStorage.setItem('resultHTML', '');

          switchBtn(false);

          // hide button get result
          get_result.prop('disabled', false);

          // wait for 1 second
          setTimeout(function(){
            window.location.href = "{{ url('consultation') }}/"+result.data.codeTest;
          },1000);
        }else{
          toastr.error(result.message);
        }
      }
    });

  })

  function resultInterface(data){
    var bodyTestResult = $('#bodyTestResult');
    var data_tes_kecerdasan = data.tes_kecerdasan;
    var data_tes_bakat = data.tes_bakat;
    // pisahkan data dengan koma
    var prodi_kecerdasan_1 = loopProdi(data.tes_kecerdasan[0].info.JURUSAN);
    var prodi_kecerdasan_2 = loopProdi(data.tes_kecerdasan[1].info.JURUSAN);
    var prodi_bakat_1 = loopProdi(data.tes_bakat[0].info.JURUSAN);
    var prodi_bakat_2 = loopProdi(data.tes_bakat[1].info.JURUSAN);
    var prodi_bakat_3 = loopProdi(data.tes_bakat[2].info.JURUSAN);

    var html = '';

    // tes kecerdasan
    html += `{{-- RESULT TES KECERDASAN --}}
                <div class="row mt-3">
                  <div
                    class="col-12 d-flex flex-column align-items-center text-white justify-content-center estetik-background-right"
                    style="height: 250px; border-radius: 15px; padding: 20px;">
                    <small>Hasil Tes Kecerdasan :</small>
                    <h3 class="mb-2 mt-1"><b>${data_tes_kecerdasan[0].aspek_name}</b> <i class="bi bi-patch-check-fill text-warning"></i></h3>
                    <div class="custom-scrollbar" style="max-width:350px;max-height:100px">
                      <small class=" text-center mt-2 col-9">${data_tes_kecerdasan[0].info.DESKRIPSI_HASIL_TES}</small>
                    </div>

                    <hr>
                    <small>
                      Rekomendasi Program Studi :
                      ${prodi_kecerdasan_1}
                    </small>
                  </div>
                </div>
                <div class="row mt-1">
                  <div
                    class="col-12 d-flex flex-column align-items-center text-white justify-content-center estetik-background-left"
                    style="height: 50px; border-radius: 15px; padding: 20px;">
                  </div>
                </div>
                {{-- END RESULT TES KECERDASAN --}}`;
   html += `{{-- RESULT TES KECERDASAN --}}
                <div class="row mt-3">
                  <div
                    class="col-12 d-flex flex-column align-items-center text-white justify-content-center estetik-background-right"
                    style="height: 250px; border-radius: 15px; padding: 20px;">
                    <small>Hasil Tes Kecerdasan :</small>
                    <h3 class="mb-2 mt-1"><b>${data_tes_kecerdasan[1].aspek_name}</b> <i class="bi bi-patch-check-fill text-warning"></i></h3>
                    <div class="custom-scrollbar" style="max-width:350px;max-height:100px">
                      <small class=" text-center mt-2 col-9">${data_tes_kecerdasan[1].info.DESKRIPSI_HASIL_TES}</small>
                    </div>
                    <hr>
                    <small>
                      Rekomendasi Program Studi :
                      ${prodi_kecerdasan_2}
                    </small>
                  </div>
                </div>
                <div class="row mt-1">
                  <div
                    class="col-12 d-flex flex-column align-items-center text-white justify-content-center estetik-background-left"
                    style="height: 50px; border-radius: 15px; padding: 20px;">
                  </div>
                </div>
                {{-- END RESULT TES KECERDASAN --}}`;

    // tes bakat
    html += `{{-- RESULT TES BAKAT --}}
                <div class="row mt-5 estetik-background-RIASEC-header">
                  Hasil Tes Minat :
                </div>`;

    html+= `<div class="row mt-2">
                      <div
                        class="col-6 d-flex flex-column align-items-center text-dark justify-content-center estetik-background-RIASEC-1"
                        style="height: 250px; padding: 20px;">
                        {{-- div with circle background --}}
                        <div class="d-flex justify-content-center align-items-center"
                          style="width: 150px; height: 150px; border-radius: 100%; background-color: #242424;">
                          <h1 class="text-white" style="font-size: 100px"><b>${(data_tes_bakat[0].aspek_name).charAt(0)}</b></h1>
                        </div>
                        <h3 class="mb-2 mt-1"><b>${data_tes_bakat[0].aspek_name}</b> <i class="bi bi-patch-check-fill text-dark"></i></h3>

                      </div>
                      <div class="col-6 bg-secondary p-3 text-light">
                        
                        <div class="custom-scrollbar" style="max-width:550px;max-height:100px">
                          <p>${data_tes_bakat[0].info.DESKRIPSI_HASIL_TES}</p>
                        </div>
                        <small class="mt-3">
                          Rekomendasi Program Studi :
                          ${prodi_bakat_1}
                        </small>
                      </div>
                    </div>`;

      html+= `<div class="row mt-2">
                      <div
                        class="col-6 d-flex flex-column align-items-center text-dark justify-content-center estetik-background-RIASEC-2"
                        style="height: 250px; padding: 20px;">
                        {{-- div with circle background --}}
                        <div class="d-flex justify-content-center align-items-center"
                          style="width: 150px; height: 150px; border-radius: 100%; background-color: #242424;">
                          <h1 class="text-white" style="font-size: 100px"><b>${(data_tes_bakat[1].aspek_name).charAt(0)}</b></h1>
                        </div>
                        <h3 class="mb-2 mt-1"><b>${data_tes_bakat[1].aspek_name}</b> <i class="bi bi-patch-check-fill text-dark"></i></h3>

                      </div>
                      <div class="col-6 bg-secondary p-3 text-light">
                        
                        <div class="custom-scrollbar" style="max-width:550px;max-height:100px">
                          <p>${data_tes_bakat[1].info.DESKRIPSI_HASIL_TES}</p>
                        </div>
                        <small class="mt-3">
                          Rekomendasi Program Studi :
                          ${prodi_bakat_2}
                        </small>
                      </div>
                    </div>`;
        html+= `<div class="row mt-2">
                      <div
                        class="col-6 d-flex flex-column align-items-center text-dark justify-content-center estetik-background-RIASEC-3"
                        style="height: 250px; padding: 20px;">
                        {{-- div with circle background --}}
                        <div class="d-flex justify-content-center align-items-center"
                          style="width: 150px; height: 150px; border-radius: 100%; background-color: #242424;">
                          <h1 class="text-white" style="font-size: 100px"><b>${(data_tes_bakat[2].aspek_name).charAt(0)}</b></h1>
                        </div>
                        <h3 class="mb-2 mt-1"><b>${data_tes_bakat[2].aspek_name}</b> <i class="bi bi-patch-check-fill text-dark"></i></h3>

                      </div>
                      <div class="col-6 bg-secondary p-3 text-light">
                        
                        <div class="custom-scrollbar" style="max-width:550px;max-height:100px">
                          <p>${data_tes_bakat[2].info.DESKRIPSI_HASIL_TES}</p>
                        </div>
                        <small class="mt-3">
                          Rekomendasi Program Studi :
                          ${prodi_bakat_3}
                        </small>
                      </div>
                    </div>{{-- END RESULT TES BAKAT --}}`;

                    html = `<div class="col">${html}</div>`;

  
    // append html to #bodyTestResult .col
    bodyTestResult.html(html);
    localStorage.setItem('resultHTML', html);
  
              }

  function loopProdi(prodi){
    var html = '';
    prodi.forEach(function(item,index){
      html += `<a href="{{ url('program-study/') }}/${item.JURUSAN_ID}" target="_BLANK"><span class="badge bg-primary">${item.NAMA_JURUSAN}</span></a> &nbsp;`;
    })

    return html;
  }

  function updateStep(codeTest,step){
    var data = {
      'codeTest' : codeTest,
      'step' : step
    }

    $.ajax({
      url: "{{ url('api/report/updateStep') }}",
      type: "POST",
      data : data,
      success: function(result){
        if(result.success == true){
          localStorage.setItem('step', step);

          
        }else{
          console.log(result.message);
        }
      }
    });
  }

</script>
@endsection