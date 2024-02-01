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
    <h2 class="">LEMBAR KERJA PESERTA DIDIK</h2>
  </div>
  <div>
    <h3>A. IDENTITAS SISWA</h3>
    <table border="0" width="35%">
      <tbody>
        <tr>
        </tr>
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
    <p class="text-justify">
      Hallo sobat karier, terimakasih sudah mengikuti rangkaian tes dengan baik. Setelah melihat hasil tes minat dan
      kecerdasan majemuk kamu, yuk buat perencanaan karier agar masa depan kamu semakin gemilang!
    </p>
  </div>


  <ol>
    {{-- foreach --}}
    @foreach ($data['lkpd_answer'] as $item)
    <li>
      <b>{{ $item['QUESTION'] }}</b>
      <p>Jawab : {{ $item['ANSWER'] }}</p>
    </li>
    @endforeach
    {{-- endforeach --}}
  </ol>



  <div class="mt-1">
    <p><i>*Silahkan konsultasikan perencanaan karier kamu kepada konselor terdekat.</i></p>
  </div>



</body>

</html>