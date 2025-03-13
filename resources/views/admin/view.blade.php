@extends('layouts.admin')
@section('content')

@if ($surats->isNotEmpty())
    @foreach ($surats as $surat)
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
        </div>
        <div class="col-md-12 d-flex justify-content-center"> <!-- Updated to justify-content-center -->
            <form action="{{ route('hapusSurat', $surat->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg mr-3"><i class="fas fa-trash"></i> Hapus</button>
            </form>
        </div>
    @endforeach
@else
    <p>Tidak ada surat yang tersedia.</p>
@endif
<a href="{{ route('buatSurat') }}" class="btn btn-secondary btn-lg "><i class="fas fa-arrow-left"></i> Kembali</a>
@endsection