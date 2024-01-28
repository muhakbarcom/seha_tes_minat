<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $filename }}</title>
  <style>
    .box-head {
      background-color: #0A1D56;
      color: #fff;
      border-bottom: 2px solid #49438d;
      width: 100%;
      height: 100px;
      padding: 10px;
      margin-bottom: 20px;
    }

    .text-center {
      text-align: center;
    }

    .text-justify {
      text-align: justify;
    }

    .box-head h2 {
      margin-top: 35px;
    }

    table {
      margin-top: 20px;
    }

    /* margin top */
    .mt-1 {
      margin-top: 1em;
    }

    .mt-2 {
      margin-top: 2em;
    }

    .mt-3 {
      margin-top: 3em;
    }

    .mt-4 {
      margin-top: 4em;
    }

    .mt-5 {
      margin-top: 5em;
    }

    .page_break {
      page-break-before: always;
    }
  </style>
</head>

<body>
  <div class="box-head text-center ">
    <h2 class="">TES MINAT - RIASEC</h2>
  </div>
  <div>
    <table border="0" width="35%">
      <tbody>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>{{ $data['data_form']['FULL_NAME'] }}</td>
        </tr>
        <tr>
          <td>Usia</td>
          <td>:</td>
          <td>
            @php
            $bday = DateTime::createFromFormat('Y-m-d', $data['data_form']['BIRTHDAY']);
            $today = new DateTime('now');

            if ($bday !== false) {
            $diff = $today->diff($bday);
            echo $diff->y." Tahun"; // Output the age in years
            } else {
            echo 'Invalid date format'; // Handle invalid date
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Asal sekolah/univ</td>
          <td>:</td>
          <td>{{ $data['data_form']['SCHOOL'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <hr>
  <div class="mt-1">
    <b>Hi Sobat Karier!</b>
    <br>
    <p class="text-justify">
      <b>RIASEC</b> merupakan alat pengukuran yang paling sering digunakan dalam membuat perencanaan karir masa depan.
      Terimakasih sudah mengerjakan tes dengan baik berikut hasil tes minat kamu:
    </p>
  </div>
  @php
  $i = 1;
  @endphp

  {{-- foreach --}}
  @foreach ($data['tes_bakat'] as $item)
  <div class="">
    <h3>{{ $i.". ".$item['aspek_name'] }}</h3>
    <p class="text-justify">
      {{ $item['info']['DESKRIPSI_HASIL_TES'] }}
    </p>
    <p>Rekomendasi Jurusan <br>
      <i>Berikut adalah rekomendasi jurusan yang bisa kamu pilih berdasarkan hasil tes yang kamu lakukan</i>

      {{-- foreach --}}
    <ol>
      @foreach ($item['info']['JURUSAN'] as $item2)
      <li>{{ $item2['NAMA_JURUSAN'] }}</li>
      @endforeach
    </ol>
    {{-- endforeach --}}

    </p>
  </div>
  @php
  $i++;
  @endphp
  @endforeach
  {{-- endforeach --}}



  <div class="mt-1">
    <p><i>*hasil tes ini dapat kamu jadikan panduan untuk membuat Keputusan study jalur kariermu, pelajari hasilnya dan
        diskusikan dengan konselor terdekat</i></p>
  </div>

  <div class="page_break"></div>

  <div class="box-head text-center ">
    <h2 class="">Tes Kecerdasan Majemuk (Multiple Intelegence)</h2>
  </div>
  <div>
    <table border="0" width="35%">
      <tbody>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>{{ $data['data_form']['FULL_NAME'] }}</td>
        </tr>
        <tr>
          <td>Usia</td>
          <td>:</td>
          <td>
            @php
            $bday = DateTime::createFromFormat('Y-m-d', $data['data_form']['BIRTHDAY']);
            $today = new DateTime('now');

            if ($bday !== false) {
            $diff = $today->diff($bday);
            echo $diff->y." Tahun"; // Output the age in years
            } else {
            echo 'Invalid date format'; // Handle invalid date
            }
            @endphp
          </td>
        </tr>
        <tr>
          <td>Asal sekolah/univ</td>
          <td>:</td>
          <td>{{ $data['data_form']['SCHOOL'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <hr>
  <div class="mt-1">
    <b>Hi Sobat Karier!</b>
    <br>
    <p class="text-justify">
      Terimakasih sudah mengerjakan tes kecerdasan majemuk dengan baik, berikut hasil tes kecerdasan majemuk kamu:
    </p>
  </div>

  @php
  $i = 1;
  @endphp
  {{-- foreach tes_kecerdasan --}}
  @foreach ($data['tes_kecerdasan'] as $item)
  <div class="">
    <h3>{{ $i.". ".$item['aspek_name'] }}</h3>
    <p class="text-justify">
      {{ $item['info']['DESKRIPSI_HASIL_TES'] }}
    </p>
    <p>Rekomendasi Jurusan <br>
      <i>Berikut adalah rekomendasi jurusan yang bisa kamu pilih berdasarkan hasil tes yang kamu lakukan</i>

      {{-- foreach --}}
    <ol>
      @foreach ($item['info']['JURUSAN'] as $item2)
      <li>{{ $item2['NAMA_JURUSAN'] }}</li>
      @endforeach
    </ol>
    {{-- endforeach --}}

    </p>
  </div>
  @php
  $i++;
  @endphp
  @endforeach
  {{-- endforeach --}}



  <div class="mt-1">
    <p><i>*hasil tes ini berdasarkan pada pandangan subjektif kamu, untuk tindak lanjut yang lebih maksimal silahkan
        konsultasikan pada konselor terdekat.</i></p>
  </div>

</body>

</html>