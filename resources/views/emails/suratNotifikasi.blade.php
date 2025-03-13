<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Surat Baru</title>
</head>
<body>
    <h1>Internal Memo</h1>
    <p>Nomor Surat: {{ $data['nomor_surat'] }}</p>
    <p>Tanggal Kirim: {{ $data['tanggal_kirim'] }}</p>
    <p>Kepada: {{ $data['kepada'] }}</p>
    <p>Perihal: {{ $data['perihal'] }}</p>
    <p>Silakan login ke aplikasi untuk melihat surat lengkapnya: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>
</body>
</html>
