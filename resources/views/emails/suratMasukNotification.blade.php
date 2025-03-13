<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Surat Masuk Baru</title>
</head>
<body>
    <h1>Notifikasi Surat Masuk Baru</h1>
    <p>Ada surat masuk baru dengan detail sebagai berikut:</p>
    <ul>
        <li>Nomor Surat: {{ $surat->nomor_surat }}</li>
        <li>Tanggal Kirim: {{ $surat->tanggal_kirim }}</li>
        <li>Kepada: {{ $surat->kepada }}</li>
        <li>Perihal: {{ $surat->perihal }}</li>
       <li><p>Silakan login ke aplikasi untuk melihat surat lengkapnya: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p></li>
    </ul>
</body>
</html>
