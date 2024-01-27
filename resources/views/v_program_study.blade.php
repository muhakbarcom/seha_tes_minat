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
        <div class="row" id="listData">

        </div>
        <div class="row">
          <div class="col">
            {{-- pagination --}}
            {{-- {{ $data->links() }} --}}
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center" id="pagination">
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

<script>
  $(document).ready(function () {
    getlistData(1)
  });

  function getlistData(page){
    $.ajax({
      url: "{{ url('/api/prodi') }}",
      data : {
        'page' : page
      },
      type: "GET",
      dataType: "JSON",
      success: function (result) {
        stringCard(result.data.data);
        makePaginationLaravel(result.data.links);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseJSON);
      }
    });
  }

  function stringCard(data){
    var string = '';
    var path = "{{ asset('/img/jurusan/') }}";
    
    data.forEach(element => {
      var url = "{{ url('/program-study') }}" + '/' + element.ID;
      
      string += `
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="${path+'/'+element.GAMBAR}" alt="${element.NAMA_JURUSAN}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">${element.NAMA_JURUSAN}</h5>
            <p class="card-text"><small>${element.DESKRIPSI}..</small></p>
            <a href="${url}" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      `;
    });

    $('#listData').html(string);
  }

  function makePaginationLaravel(links){
    var string = '';
    

    links.forEach(element => {
      let page = element.label;
    let active = (element.active) ? 'active' : '';
      string += `<li class="page-item ${active}"><a class="page-link" href="#" onclick="getlistData(${page})">${page}</a></li>`;
    });

    $('#pagination').html(string);
  }
</script>

@endsection