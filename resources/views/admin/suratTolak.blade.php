@extends('layouts.admin')
@section('content')

<div style="width: 21cm; height: 29.7cm; padding: 2cm; background-color: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); position: relative; margin: 0 auto; display: flex; flex-direction: column; align-items: center; margin-bottom: 2cm; page-break-after: always;">
    <div style="text-align: center; margin-bottom: 1cm;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 100%; height: auto;">
    </div>
    <div style="text-align: left; margin-bottom: 0.5cm;">
        <h4 style="margin: 0;">MEMO INTERNAL</h4>
    </div>
    <hr style="border: 2px solid #000000; width: 100%;"> <!-- garis atas -->
    <table style="line-height: 1.5; margin-bottom: 1cm; width: 100%;">
        <tr>
            <td style="padding-right: 10px;">No</td>
            <td>: {{ $surat->nomor_surat }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Tanggal</td>
            <td>: {{ $surat->tanggal_kirim }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Kepada</td>
            <td>: {{ $surat->kepada }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Perihal</td>
            <td>: {{ $surat->perihal }}</td>
        </tr>
    </table>
    <hr style="border: 2px solid #000000; width: 100%;"> <!-- Garis pemisah -->
    <div style="line-height: 1.5; margin-bottom: 1cm;">
        <p style="margin: 0;">Dengan hormat;</p>
        <br>
        <p style="margin: 0; text-align: left; justify-content: auto; word-break: break-word;">{!! nl2br(html_entity_decode(strip_tags($surat->isi_surat))) !!}</p>
        <br>
        <p style="margin: 0;">Demikianlah surat permohonan ini kami buat, atas perhatiannya kami ucapkan terimakasih.</p>
    </div>

    <!-- Stempel Ditolak -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;">
        <img src="{{ asset('images/ditolak.jpg') }}" alt="Stempel Ditolak" style="max-width: 300px; width: 100%; height: auto;">
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('suratMasuk') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection
