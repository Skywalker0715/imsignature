@extends('layouts.manager')
@section('content')

@if ($surat)
    <div style="width: 21cm; height: 29.7cm; padding: 2cm; background-color: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); position: relative; margin: 0 auto; display: flex; flex-direction: column; align-items: center; margin-bottom: 2cm; page-break-after: always;">
        <div style="text-align: center; margin-bottom: 1cm;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 100%; height: auto;">
        </div>
        <div style="text-align: left;"> <!-- New div for left alignment -->
            <h4 style="margin: 0; text-align: left !important;">MEMO INTERNAL</h4>
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
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-auto mb-3">
                <form action="{{ route('setujuiSurat', $surat->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Setujui</button>
                </form>
            </div>
            <div class="col-md-auto mb-3">
                <form action="{{ route('tolakSurat', $surat->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="/tinjauSurat" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
@else
    <p>Tidak ada surat yang tersedia.</p>
@endif

@endsection