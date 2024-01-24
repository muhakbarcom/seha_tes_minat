@extends('layouts.v_template')

@section('title', 'Test Information')

@section('style')

@endsection



@section('content')

{{-- beri jarak 100 px dari atas --}}
<section></section>

<section class="inner-page">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h2 class="text-center">Program Studi</h2>
        <hr>
        <div class="row d-flex justify-content-center">
          <div class="col-7">
            <div class="row mt-3">
              <div class="col">
                <h4 id="NAMA_JURUSAN"></h4>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col" id="DESKRIPSI">

              </div>
            </div>

            <div class="row mt-3">
              <h5>Kenapa Harus Jurusan Ini?</h5>
              <div class="col" id="KENAPA_HARUS_JURUSAN_INI">

              </div>
            </div>
            <div class="row mt-3">
              <h5>Pengetahuan dan Keahlian</h5>
              <div class="col" id="PENGETAHUAN_DAN_KEAHLIAN">

              </div>
            </div>
            <div class="row mt-3">
              <h5>Prospek Kerja</h5>
              <div class="col" id="PROSPEK_KERJA">

              </div>
            </div>
            <div class="row mt-3">
              <h5>Dunia Perkuliahan</h5>
              <div class="col" id="DUNIA_PERKULIAHAN">

              </div>
            </div>

            {{-- back --}}
            <div class="row mt-3">
              <div class="col">

                <a href="{{ url('/program_study') }}" class="btn btn-primary"> <i class="bi bi-arrow-left"></i>
                  Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

<script>
  var id = {{ $id }};
  $(document).ready(function () {
    getlistData(id)
  });

  function getlistData(id){
    var NAMA_JURUSAN = $('#NAMA_JURUSAN');
    var DESKRIPSI = $('#DESKRIPSI');
    var KENAPA_HARUS_JURUSAN_INI = $('#KENAPA_HARUS_JURUSAN_INI');
    var PENGETAHUAN_DAN_KEAHLIAN = $('#PENGETAHUAN_DAN_KEAHLIAN');
    var PROSPEK_KERJA = $('#PROSPEK_KERJA');
    var DUNIA_PERKULIAHAN = $('#DUNIA_PERKULIAHAN');

    $.ajax({
      url: "{{ url('/api/prodi/') }}" + "/" + id,
      type: "GET",
      dataType: "JSON",
      success: function (result) {
        NAMA_JURUSAN.html(result.data.NAMA_JURUSAN);
        DESKRIPSI.html(result.data.DESKRIPSI);
        KENAPA_HARUS_JURUSAN_INI.html(result.data.KENAPA_HARUS_JURUSAN_INI);
        PENGETAHUAN_DAN_KEAHLIAN.html(result.data.PENGETAHUAN_DAN_KEAHLIAN);
        PROSPEK_KERJA.html(result.data.PROSPEK_KERJA);
        DUNIA_PERKULIAHAN.html(result.data.DUNIA_PERKULIAHAN);
        
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseJSON);
      }
    });
  }

  
</script>

@endsection