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

    .h3-green {
      color: #6578cf !important;
    }

    .list-jurusan-box {
      background-color: #6578cf;
      color: #fff;
      padding: 5px;
      margin-bottom: 5px;
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

  <div class="mt-1">
    <p>Presentase Hasil Tes:</p>
    <div style="text-align: center;">
      <table
        style="background-color: #6578cf; border: 1px solid #000; padding: 5px; border-spacing: 0; margin: 0 auto;">
        <tr>
          @foreach ($data['presentageJson']['tes_minat'] as $item)
          <td style="padding: 10px; text-align: center; color: #fff; border: 1px solid #000;">
            <strong>{{ $item['aspek_name'] }}</strong> <br>
            {{ $item['presentase_all'] }}%
          </td>
          @endforeach
        </tr>
      </table>
    </div>



  </div>

  @php
  $i = 1;
  @endphp

  {{-- foreach --}}
  @foreach ($data['tes_bakat'] as $item)
  <div style="margin-bottom:100px">
    <div style="text-align: center">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td style="border-top: 5px solid #6578cf;"></td>
        </tr>
        <tr>
          <td style="padding: 10px;">
            <h3 style="color: #6578cf; text-align: center; font-size: 1.2rem;"><i>{{ strtoupper($item['aspek_name'])
                }}</i></h3>
            <p style="text-align: justify; font-size: 1rem;">{{ $item['info']['DESKRIPSI_HASIL_TES'] }}</p>
          </td>
        </tr>
        <tr>
          <td style="border-bottom: 5px solid #6578cf;"></td>
        </tr>
      </table>


      <table style="width: 100%;border-collapse: collapse" class="mt-3">
        <tr>
          <td style="background-color: #6578cf;padding:5px;color:#fff">
            <center><b>Yuk upgrade diri kamu!</b></center>
          </td>
        </tr>
        <tr>
          <td style="border:1px solid #000">
            <p class="text-justify">
              <center>
                (Deskripsi pengembangan karakteristik)
              </center>
            </p>
          </td>
        </tr>
      </table>
    </div>

    <div style="display: none">
      <p>Rekomendasi Jurusan <br>
        <i>Berikut adalah rekomendasi jurusan yang bisa kamu pilih berdasarkan hasil tes yang kamu lakukan</i>

        {{-- foreach --}}
      <ol>
        @foreach ($item['info']['JURUSAN'] as $item2)
        <li>{{ $item2['NAMA_JURUSAN'] }}</li>
        @endforeach
      </ol>
      {{-- endforeach --}}
    </div>

    </p>
  </div>
  @php
  $i++;
  @endphp
  @endforeach
  {{-- endforeach --}}



  <div class="mt-1">
    <center>
      <p><i>*Hasil Tes Ini Berdasarkan Pada Pandangan Subjektif Kamu, Untuk Tindak Lanjut Yang Lebih
          Maksimal Silahkan Konsultasikan Pada Konselor Terdekat</i></p>
    </center>
  </div>

  {{-- new page --}}
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

  <p>Presentase Hasil Tes:</p>
  <table
    style="background-color: #6578cf; border: 1px solid #000; padding: 5px; border-collapse: collapse; width: 100%;">
    <tr>
      @foreach ($data['presentageJson']['tes_riasec'] as $item)
      <td
        style="font-size:8px;padding: 10px; text-align: center; color: #fff; border: 1px solid #000; width: {{ 100 / count($data['presentageJson']['tes_riasec']) }}% !important;">
        <strong>{{ $item['aspek_name'] }}</strong> <br>
        {{ $item['presentase_all'] }}%
      </td>
      @endforeach
    </tr>
  </table>


  @php
  $i = 1;
  @endphp
  {{-- foreach kecerdasan--}}
  @foreach ($data['tes_kecerdasan'] as $item)
  <div style="margin-bottom:100px">
    <div style="text-align: center">
      <table style="width: 100%; border-collapse: collapse;margin:0 auto;">
        <tr>
          <td style="border-top: 5px solid #6578cf;"></td>
        </tr>
        <tr>
          <td>
            <h3 class="h3-green"><i>{{ strtoupper($item['aspek_name']) }}</i></h3>

            <p class="text-justify">
              <center> {{ $item['info']['DESKRIPSI_HASIL_TES'] }}</center>
            </p>
          </td>
        </tr>
        <tr>
          <td style="border-bottom: 5px solid #6578cf;"></td>
        </tr>
      </table>

      <table style="width: 100%;border-collapse: collapse" class="mt-3">
        <tr>
          <td style="background-color: #6578cf;padding:5px;color:#fff">
            <center><b>Yuk upgrade diri kamu!</b></center>
          </td>
        </tr>
        <tr>
          <td style="border:1px solid #000">
            <p class="text-justify">
              <center>
                (Deskripsi pengembangan karakteristik)
              </center>
            </p>
          </td>
        </tr>
      </table>
    </div>

    <div style="display: none">
      <p>Rekomendasi Jurusan <br>
        <i>Berikut adalah rekomendasi jurusan yang bisa kamu pilih berdasarkan hasil tes yang kamu lakukan</i>

        {{-- foreach --}}
      <ol>
        @foreach ($item['info']['JURUSAN'] as $item2)
        <li>{{ $item2['NAMA_JURUSAN'] }}</li>
        @endforeach
      </ol>
      {{-- endforeach --}}
    </div>

    </p>
  </div>
  @php
  $i++;
  @endphp
  @endforeach
  {{-- endforeach --}}



  <div class="mt-1">
    <center>
      <p><i>*Hasil Tes Ini Berdasarkan Pada Pandangan Subjektif Kamu, Untuk Tindak Lanjut Yang Lebih
          Maksimal Silahkan Konsultasikan Pada Konselor Terdekat</i></p>
    </center>
  </div>

  {{-- new page --}}
  <div class="page_break"></div>

  <div class="mt-1">
    <div class="box-head text-center ">
      <h2 class="">Rekomendasi Jurusan</h2>
    </div>
    <p>Hallo sobat karier, berdasarkan hasil tes yang sudah kamu laksanakan, berikut rekomendasi jurusan untuk kamu:</p>

    <ol>
      @foreach ($data['tes_bakat'][0]['info']['JURUSAN'] as $item)
      <li class="list-jurusan-box">{{ $item['NAMA_JURUSAN'] }}</li>
      @endforeach
    </ol>
  </div>

</body>

</html>