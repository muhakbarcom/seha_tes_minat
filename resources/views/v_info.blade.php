@extends('layouts.v_template')

@section('title', 'Test Information')

@section('style')
<style>
  .custom-box {
    background-color: #001f3f;
    /* Warna biru tua */
    color: #ffffff;
    /* Warna teks putih */
    text-align: center;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    font-size: 24px;
    cursor: pointer;
    transition: background-color 0.5s ease, color 0.5s ease;
    /* Animasi dengan kecepatan 0.5 detik */
  }

  .custom-box:hover {
    background-color: #0074D9;
    /* Warna biru muda */
    color: #ffffff;
    /* Warna teks putih */
  }

  .custom-box:nth-child(1) {
    animation: fadeIn 0.5s ease 0.1s both;
  }

  .custom-box:nth-child(2) {
    animation: fadeIn 0.5s ease 0.2s both;
  }

  .custom-box:nth-child(3) {
    animation: fadeIn 0.5s ease 0.3s both;
  }

  .custom-box:nth-child(4) {
    animation: fadeIn 0.5s ease 0.4s both;
  }

  .custom-box:nth-child(5) {
    animation: fadeIn 0.5s ease 0.5s both;
  }

  .custom-box:nth-child(6) {
    animation: fadeIn 0.5s ease 0.6s both;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }
</style>
@endsection



@section('content')

{{-- beri jarak 100 px dari atas --}}
<section></section>

<!-- ======= Features Section ======= -->
<section id="features" class="features" data-aos="fade-up">
  <div class="container">

    <div class="section-title">
      <h2>RIASEC – HOLLAND</h2>
      {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
        in iste officiis commodi quidem hic quas.</p> --}}
    </div>

    <div class="row content">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="1">R</div>
          </div>
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="2">I</div>
          </div>
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="3">A</div>
          </div>
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="4">S</div>
          </div>
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="5">E</div>
          </div>
          <div class="col-md-2">
            <div class="custom-box" data-aos="fade-up" data-id="6">C</div>
          </div>
        </div>
      </div>

      <div class="col-md-12 mt-5" data-aos="fade-right" data-aos-delay="100">
        <h3 id="reasec-title"></h3>
        <table class="table table-bordered" id="table-riasec">
          <thead>
            <tr>
              <th scope="col">Deskripsi bidang minat </th>
              <th scope="col">keterampilan kunci </th>
              <th scope="col">Komponen pekerjaan</th>
              <th scope="col">Program Study pendukung</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
        </table>
      </div>

    </div>


  </div>
</section><!-- End Features Section -->

<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">

    </div>

  </div>
</section><!-- End Services Section -->



<section id="faq" class="faq">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Apa itu multiple Intelegence?</h2>
      <p class="small">Multiple intelligence atau yang dikenal juga dengan kecerdasan majemuk adalah kemampuan untuk
        memecahkan
        masalah atau melakukan sesuatu yang ada nilainya dalam kehidupan sehari-hari. Kecerdasan bukan sesuatu yang
        dapat dilihat atau dihitung, melainkan potensi sel otak yang aktif atau nonaktif tergantung pada pengalaman
        hidup sehari-hari, baik di rumah, sekolah atau di tempat lain</p>
    </div>

    <ul class="faq-list">



    </ul>

  </div>
</section><!-- End Frequently Asked Questions Section -->

@endsection

@section('script')
<script>
  var dataRIASEC=[];
  var dataMI=[];

  // on load
  $(document).ready(function () {

    // get data riasec GET to /api/info/2
    $.ajax({
      url: "{{ url('/api/info/2') }}",
      type: "GET",
      dataType: "json",
      success: function (res) {
        dataRIASEC = res.data;

        //ambil data dari dataRIASEC
        var data = dataRIASEC.find(item => item.ID == 1);
        
        $('#reasec-title').text(data.NAME)
        //tampilkan data ke dalam table
        $('#table-riasec tbody').html(`
          <tr>
            <td>${data.DESKRIPSI_BIDANG_MINAT}</td>
            <td>${data.KETERAMPILAN_KUNCI}</td>
            <td>${data.KOMPONEN_PEKERJAAN}</td>
            <td>${data.PROGRAM_STUDY}</td>
          </tr>
        `);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseJSON);
      }
    });
    
    $.ajax({
      url: "{{ url('/api/info/1') }}",
      type: "GET",
      dataType: "json",
      success: function (res) {
        dataMI = res.data;
        var num = 1;
        var MIList = '';

        dataMI.forEach(item => {

          let keterampilan = item.KETERAMPILAN_KUNCI.split('.,');
          var keterampilanList = '';

          keterampilan.forEach(k => {
            k = k.trim();
            keterampilanList += `<span class="badge bg-primary d-inline-block">${k}</span>`;
          });

          MIList += `
            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq${num}">${item.NAME} <i
                  class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq${num}" class="collapse" data-bs-parent=".faq-list">
                <table class="table table-bordered">
                  <tr>
                    <thead>
                      <th>Deskripsi Bidang Intelegensi</th>
                      <th>Keterampilan Kunci</th>
                      <th>Komponen Pekerjaan</th>
                      <th>Program Study Pendukung</th>
                    </thead>
                  </tr>
                  <tr>
                    <td>${item.DESKRIPSI_BIDANG_MINAT}</td>
                    <td>
                      ${keterampilanList}
                    </td>
                    <td>${item.KOMPONEN_PEKERJAAN}</td>
                    <td>${item.PROGRAM_STUDY}</td>
                  </tr>
                </table>
              </div>
            </li>
          `;

          num++;
        });

        $('.faq-list').html(MIList);

      },
      error: function (xhr, status, error) {
        console.log(xhr.responseJSON);
      }
    });

    
  });

  //aksi saat klik .custom-box
  $('.custom-box').click(function () {
    //ambil id dari .custom-box yang diklik
    var id = $(this).data('id');
    //cari data dari dataRIASEC berdasarkan id
    var data = dataRIASEC.find(item => item.ID == id);
    $('#reasec-title').text(data.NAME)
    
    //tampilkan data ke dalam table
    $('#table-riasec tbody').html(`
      <tr>
        <td>${data.DESKRIPSI_BIDANG_MINAT}</td>
        <td>${data.KETERAMPILAN_KUNCI}</td>
        <td>${data.KOMPONEN_PEKERJAAN}</td>
        <td>${data.PROGRAM_STUDY}</td>
      </tr>
    `);

    // trigger data-aos
    AOS.refresh();
  });
</script>
@endsection