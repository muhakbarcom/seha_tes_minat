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

@section('script')
<script>
  var dataRIASEC = [
    {
      "id": 1,
      "nama": "REALISTIC",
      "deskripsi_bidang_minat": "Suka bekerja terutama dengan tangan, membuat, memperbaiki, merakit atau membangun sesuatu, menggunakan dan mengoperasikan peralatan, alat atau mesin. Seringkali suka bekerja di luar ruangan",
      "keterampilan_kunci": "Menggunakan dan mengoperasikan alat, peralatan dan mesin, merancang, membangun, memperbaiki, memelihara, bekerja secara manual, mengukur, bekerja secara detail, mengemudi, bergerak, merawat hewan, bekerja dengan tanaman",
      "komponen_pekerjaan":"Pilot, petani, hortikultura, pembangun, insinyur, personel angkatan bersenjata, mekanik, tukang melapis, listrik, teknolog komputer, penjaga taman, olahragawan",
      "program_study_pendukung" : "Bahasa Inggris, Matematika, Sains, Workshop, Teknologi, Komputer, Studi Bisnis, Pertanian, Hortikultura, Pendidikan Jasmani"
    },
    {
      "id": 2,
      "nama": "INVESTIGATIVE",
      "deskripsi_bidang_minat": "Suka menemukan dan meneliti ide, mengamati, menyelidiki, dan bereksperimen, mengajukan pertanyaan, dan menyelesaikan masalah",
      "keterampilan_kunci": "Berpikir analitis dan logis, menghitung, berkomunikasi dengan menulis dan berbicara, merancang, merumuskan, menghitung, mendiagnosis, bereksperimen, menyelidiki",
      "komponen_pekerjaan":"Ilmu pengetahuan, penelitian, pekerjaan medis dan kesehatan, ahli kimia, ilmuwan kelautan, teknisi kehutanan, teknisi laboratorium medis atau pertanian, ahli zoologi, dokter gigi, dokter",
      "program_study_pendukung" : "Bahasa Inggris, Matematika, Sains, Komputer, Teknologi"
    },
    {
      "id": 3,
      "nama": "ARTISTIC",
      "deskripsi_bidang_minat": "Suka menggunakan kata-kata, seni, musik atau drama untuk berkomunikasi, melakukan, atau mengekspresikan diri, membuat dan merancang sesuatu",
      "keterampilan_kunci": "Mengekspresikan secara artistik atau fisik, berbicara, menulis, menyanyi, tampil, merancang, menyajikan, merencanakan, menyusun, bermain, menari",
      "komponen_pekerjaan":"Artis, ilustrator, fotografer, penulis lagu, komposer, penyanyi, pemain instrumen, penari, aktor, reporter, penulis, editor, pengiklan, penata rambut, perancang busana",
      "program_study_pendukung" : "Bahasa Inggris, Ilmu Sosial, Musik, Drama, Seni, Desain Grafis, Komputer, Studi Bisnis, Bahasa"
    },
    {
      "id": 4,
      "nama": "SOCIAL",
      "deskripsi_bidang_minat": "Suka mengajar, melatih dan memberi informasi, membantu, mengobati, menyembuhkan dan melayani dan menyapa, peduli dengan kesejahteraan diri dan kesejahteraan orang lain",
      "keterampilan_kunci": "Berkomunikasi secara lisan atau tertulis, peduli dan mendukung, melatih, bertemu, menyapa, membantu, mengajar, memberi informasi, mewawancarai, melatih",
      "komponen_pekerjaan":"Guru, perawat, asisten perawat, penasihat, petugas polisi, pekerja sosial, tenaga penjualan, petugas layanan pelanggan, pelayan, sekretaris",
      "program_study_pendukung" : "Bahasa Inggris, Ilmu Sosial, Matematika, Sains, Kesehatan, Pendidikan Jasmani, Seni, Komputer, Studi Bisnis, Bahasa"
    },
    {
      "id": 5,
      "nama": "ENTERPRISING",
      "deskripsi_bidang_minat": "Suka bertemu orang, memimpin, berbicara dan mempengaruhi orang lain, mendorong orang lain, bekerja dalam bisnis",
      "keterampilan_kunci": "Menjual, mempromosikan dan membujuk, mengembangkan ide-ide, berbicara di depan umum, mengelola, mengatur, memimpin dan menangkap, menghitung, merencanakan",
      "komponen_pekerjaan":"Tenaga penjual, pengacara, politisi, akuntan, pemilik bisnis, eksekutif atau manajer, agen perjalanan, musik atau promotor olahraga",
      "program_study_pendukung" : "Bahasa Inggris, Matematika, Studi Bisnis, Akuntansi, Ekonomi, Ilmu Sosial, Drama, Komputasi, Manajemen Informasi Teks, Bahasa"
    },
    {
      "id": 6,
      "nama": "CONVENTIONAL",
      "deskripsi_bidang_minat": "Suka bekerja di dalam ruangan dan pada tugas-tugas yang melibatkan pengorganisasian dan akurasi, mengikuti prosedur, bekerja dengan data atau angka, pekerjaan perencanaan dan acara",
      "keterampilan_kunci": "Komputasi dan keyboarding, merekam dan menyimpan catatan, memperhatikan detail, bertemu dan menyapa, melakukan perhitungan, menangani uang, mengatur, mengatur, bekerja secara mandiri",
      "komponen_pekerjaan":"Sekretaris, resepsionis, pekerja kantor, pustakawan, petugas bank, operator komputer, toko dan petugas pengiriman",
      "program_study_pendukung" : "Bahasa Inggris, Matematika, Studi Bisnis, Akuntansi, Ekonomi, Komputer, Manajemen Informasi Teks"
    }
  ];

  // on load
  $(document).ready(function () {
    //ambil data dari dataRIASEC
    var data = dataRIASEC.find(item => item.id == 1);
    $('#reasec-title').text(data.nama)
    //tampilkan data ke dalam table
    $('#table-riasec tbody').html(`
      <tr>
        <td>${data.deskripsi_bidang_minat}</td>
        <td>${data.keterampilan_kunci}</td>
        <td>${data.komponen_pekerjaan}</td>
        <td>${data.program_study_pendukung}</td>
      </tr>
    `);
  });

  //aksi saat klik .custom-box
  $('.custom-box').click(function () {
    //ambil id dari .custom-box yang diklik
    var id = $(this).data('id');
    //cari data dari dataRIASEC berdasarkan id
    var data = dataRIASEC.find(item => item.id == id);
    $('#reasec-title').text(data.nama)
    
    //tampilkan data ke dalam table
    $('#table-riasec tbody').html(`
      <tr>
        <td>${data.deskripsi_bidang_minat}</td>
        <td>${data.keterampilan_kunci}</td>
        <td>${data.komponen_pekerjaan}</td>
        <td>${data.program_study_pendukung}</td>
      </tr>
    `);

    // trigger data-aos
    AOS.refresh();
  });
</script>
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
        <h3 id="reasec-title">REALISTIC</h3>
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
              <td>Menyukai aktivitas yang melibatkan kekuatan fisik, keterampilan, dan koordinasi.</td>
              <td>Menyukai aktivitas yang melibatkan pemecahan masalah, penelitian, dan pengamatan.</td>
              <td>Menyukai aktivitas yang melibatkan kreativitas, pengungkapan diri, dan imajinasi.</td>
              <td>Menyukai aktivitas yang melibatkan membantu, mengajar, dan melayani orang lain.</td>
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

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Linguistik <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk menganalisis informasi dan membuat produk yang melibatkan Bahasa lisan, tulisan
                seperti pidato, buku dan memo. </td>
              <td>
                <span class="badge bg-primary d-inline-block">Mengerti urutan dan arti kata-kata.</span>
                <span class="badge bg-primary d-inline-block">Menjelaskan, mengajar, bercerita,</span>
                <span class="badge bg-primary d-inline-block">berdebat.</span>
                <span class="badge bg-primary d-inline-block">Humor.</span>
                <span class="badge bg-primary d-inline-block">Mengingat dan menghafal.</span>
                <span class="badge bg-primary d-inline-block">Analisis linguistik.</span>
                <span class="badge bg-primary d-inline-block">Menulis dan berbicara.</span>
                <span class="badge bg-primary d-inline-block">Main drama, berpuisi, berpidato.</span>
                <span class="badge bg-primary d-inline-block">Mahir dalam perbendaharaan kata.</span>
              </td>
              <td>Dramawan, editor,pengarang,
                jurnalis, sastrawan, orator, ahli sastra, novelis.
              </td>
              <td>Komunikasi, sastra, jurnalistik, pariwisata dan hukum.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq2">Matematis- logis <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
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
              <td>Memuat kemampuan seseorang dalam berpikir secara induktif dan deduktif, berpikir menurut aturan
                logika, memahami dan menganalisis pola angka-angka serta memecahkan masalah dengan menggunakan kemampuan
                berpikir. </td>
              <td>
                <span class="badge bg-primary d-inline-block">Logika</span>
                <span class="badge bg-primary d-inline-block">Reasioning, pola sebab akibat.</span>
                <span class="badge bg-primary d-inline-block">Klasifikasi dan kategorisasi</span>
                <span class="badge bg-primary d-inline-block">Abstraksi, simbolisasi</span>
                <span class="badge bg-primary d-inline-block">Pemikiran induktif dan deduktif</span>
                <span class="badge bg-primary d-inline-block">Menghitung dan bermain angka</span>
                <span class="badge bg-primary d-inline-block">Pemikiran ilmiah</span>
                <span class="badge bg-primary d-inline-block">Problem solving</span>
                <span class="badge bg-primary d-inline-block">Silogisme</span>
              </td>
              <td>Logikus, matematikus,
                saintis, programer, negosiator
              </td>
              <td>Akuntansi, matematika, sains, aktuaria atau programmer.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq3">Visual <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk menganalisis informasi dan membuat produk yang melibatkan Bahasa lisan, tulisan
                seperti pidato, buku dan memo. </td>
              <td>
                <span class="badge bg-primary d-inline-block">Mengenal relasi benda-benda dalam ruang dengan
                  tepat.</span>
                <span class="badge bg-primary d-inline-block">Punya persepsi yang tepat dari berbagai sudut.</span>
                <span class="badge bg-primary d-inline-block">Representasi grafik.</span>
                <span class="badge bg-primary d-inline-block">Manipulasi gambar, menggambar.</span>
                <span class="badge bg-primary d-inline-block">Mudah menemukan jalan dalam ruang.</span>
                <span class="badge bg-primary d-inline-block">Imajinasinya aktif.</span>
                <span class="badge bg-primary d-inline-block">Peka terhadap warna, garis, dan bentuk.</span>
              </td>

              <td>Pemburu, arsitek, dekorator,
                navigator, ahli peta, pelukis,
                pemahat, pengambar, pemain catur

              </td>
              <td>Arsitektur, seni rupa, DKV, Teknik atau pilot.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq4">Tubuh - Kinestetik <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk menggunakan tubuh sendiri untuk menciptakan produk atau memecahkan masalah.</td>
              <td>
                <span class="badge bg-primary d-inline-block">Mudah berekspresi dengan tubuh.</span>
                <span class="badge bg-primary d-inline-block">Mengkaitkan pikiran dan tubuh.</span>
                <span class="badge bg-primary d-inline-block">Kemampuan bermain mimik. Main drama, main peran.</span>
                <span class="badge bg-primary d-inline-block">Aktif bergerak, olahraga, menari.</span>
                <span class="badge bg-primary d-inline-block">Koordinasi dan fleksibilitas tubuh tinggi.</span>
              </td>

              <td>Aktor, atlet, penari, pemahat, ahli bedah, olahragawan
              </td>
              <td>Jurusan keolahragaan, seni kriya, seni tari, tata busana, dokter bedah.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq5">Musikal <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk menghasilkan, mengingat, dan memaknai pola suara yang berbeda. </td>
              <td>
                <span class="badge bg-primary d-inline-block">Kepekaan terhadap suara dan musik.</span>
                <span class="badge bg-primary d-inline-block">Tahu struktur musik dengan baik.</span>
                <span class="badge bg-primary d-inline-block">Mudah menangkap musik.</span>
                <span class="badge bg-primary d-inline-block">Mencipta melodi.</span>
                <span class="badge bg-primary d-inline-block">Peka dengan intonasi, ritmik.</span>
                <span class="badge bg-primary d-inline-block">Menyanyi, pentas musik.</span>
                <span class="badge bg-primary d-inline-block">Mencipta musik.</span>
                <span class="badge bg-primary d-inline-block">Pemain alat musik.</span>
              </td>

              <td>Musikus, penyanyi, pemain opera, komponis, dirigen, pemain musik
              </td>
              <td>Musik </td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq6">Interpersonal <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk mengenali dan memahami suasana hati, keinginan, motivasi dan niat orang lain.</td>
              <td>
                <span class="badge bg-primary d-inline-block">Mudah kerjasama dengan teman.</span>
                <span class="badge bg-primary d-inline-block">Mudah mengenal dan membedakan perasaan dan pribadi
                  teman.</span>
                <span class="badge bg-primary d-inline-block">Komunikasi verbal dan non-verbal.</span>
                <span class="badge bg-primary d-inline-block">Peka terhadap teman, empatis.</span>
                <span class="badge bg-primary d-inline-block">Suka memberikan feedback.</span>
              </td>

              <td>Komunikator, fasilitator,
                penggerak massa, pemersatu

              </td>
              <td>Perawat, Kesehatan Masyarakat, gizi, Pendidikan dan psikologi.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq7">Intrapersonal <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq7" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk mengenali dan memahami suasana hati, keinginan, motivasi, dan niat seseorang. </td>
              <td>
                <span class="badge bg-primary d-inline-block">Dapat berkonsentrasi dengan baik.</span>
                <span class="badge bg-primary d-inline-block">Kesadaran dan ekspresi perasaan-perasaan yang
                  berbeda.</span>
                <span class="badge bg-primary d-inline-block">Pengenalan diri yang dalam.</span>
                <span class="badge bg-primary d-inline-block">Keseimbangan diri.</span>
                <span class="badge bg-primary d-inline-block">Kesadaran akan realitas spiritual.</span>
                <span class="badge bg-primary d-inline-block">Reflektif, suka kerja sendiri.</span>
              </td>

              <td>Sufi, pendoa batin, spiritual
                yang mendalam, pendamai

              </td>
              <td>Psikologi, bimbingan konseling, </td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq8">Naturalistik <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq8" class="collapse" data-bs-parent=".faq-list">
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
              <td>Kemampuan untuk mengidentifikasi dan membedakan berbagai jenis tanaman, hewan dan formasi cuaca yang
                ditemukan dialam.</td>
              <td>
                <span class="badge bg-primary d-inline-block">Mengenal flora-fauna.</span>
                <span class="badge bg-primary d-inline-block">Mengklasifikasi dan identifikasi tumbuhan dan
                  binatang.</span>
                <span class="badge bg-primary d-inline-block">Suka pada alam.</span>
                <span class="badge bg-primary d-inline-block">Hidup di luar rumah.</span>
              </td>

              <td>Botanis, anatomis
              </td>
              <td>Dokter hewan, peternakan, kelautan dan kehutanan.</td>
            </tr>
          </table>
        </div>
      </li>
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq9">Eksistensial <i
            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
        <div id="faq9" class="collapse" data-bs-parent=".faq-list">
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
              <td>kemampuan untuk memahami pertanyaan abstrak tentang keberadaan, makna, dan tujuan hidup. cenderung
                memiliki keinginan kuat untuk mengeksplorasi pertanyaan-pertanyaan filosofis dan mencari jawaban atas
                pertanyaan tentang hakikat keberadaan manusia</td>
              <td>
                <span class="badge bg-primary d-inline-block">Memiliki pandangan jangka panjang.</span>
                <span class="badge bg-primary d-inline-block">Memikirkan sebab akibat.</span>
                <span class="badge bg-primary d-inline-block">Tertarik mendalami ilmu atau pelajaran agama.</span>
                <span class="badge bg-primary d-inline-block">Suka menolong orang lain.</span>
                <span class="badge bg-primary d-inline-block">Sangat peka terhadap masalah sosial.</span>
              </td>

              <td>Psikolog, ahli filsuf
              </td>
              <td>Psikologi atau filsafat</td>
            </tr>
          </table>
        </div>
      </li>

    </ul>

  </div>
</section><!-- End Frequently Asked Questions Section -->

@endsection