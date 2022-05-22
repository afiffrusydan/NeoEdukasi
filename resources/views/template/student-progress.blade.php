<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{ $student_name }} Progress Report</title>
<link rel="stylesheet" href="{{ public_path('css/template/student-progress.css') }}" />
</head>
<body style="background-image: url('{{ public_path("asset/images/templates/bg.png") }}');">
{{-- <header class="clearfix">
  <div id="logo"> <img src="{{ public_path("asset/images/templates/header.png") }}"> </div>
</header> --}}
<main style="margin-left:7%;">
  <div id="details" class="clearfix" style="margin-bottom: -1%;padding-top:250px;">
    <div id="client">
      <h2 class="name">{{ $student_name }}</h2>
      <div class="address">{{ $class }}</div>
      <div class="address">{{ $school }}</div>
    </div>
    <div id="invoice">
      <div class="to">Bulan</div>
      <h3>{{ $month.' '.$year }}</h3>
    </div>
  </div>
  <table border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td class="tittle" width="21%">Nama Siswa</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $student_name }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Kelas</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $class }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Sekolah</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $school }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Kurikulum</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $curriculum }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Mata Pelajaran</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $subject }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Tentor/Guru Les</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $tentor_name }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Target Belajar</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $study_target }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Metode Belajar</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $study_method }}</td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Progres Belajar Siswa</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $learning_progression }}
          </td>
      </tr>
      <tr>
        <td class="tittle" width="21%">Saran/Masukan</td>
        <td width="1%">:</td>
        <td class="normal" width="79%">{{ $feedback }}
        </td>
      </tr>
    </tbody>
  </table>
	<div id="tandatangan" style="bottom:50px;position: absolute;">
    <div class="tittle-neo">Karanganyar, {{ date('d/m/Y', strtotime($date)) }}</div>
    <div>Tentor / Guru Les</div>
    <div class="ttd">ttd</div>
    <div>{{ $tentor_name }}</div>
  </div>
</main>
</body>
</html>