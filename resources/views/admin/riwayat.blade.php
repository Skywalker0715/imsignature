@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Riwayat Pengiriman Surat</h1>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Daftar Riwayat Pengiriman Surat</h5>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Isi Surat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ date('d/m/Y', strtotime($surat->tanggal_kirim)) }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->kepada }}</td>
                            <td>
                                <p class="mb-0 text-wrap">{{ nl2br(html_entity_decode(strip_tags($surat->isi_surat))) }}</p>
                            </td>
                            <td class="{{ $surat->status == 2 ? 'text-success' : ($surat->status == 3 ? 'text-danger' : 'text-warning') }}">
                                <strong>
                                    @if ($surat->status == 0)
                                        Menunggu
                                    @elseif ($surat->status == 1)
                                        Dikirim
                                    @elseif ($surat->status == 2)
                                        Diterima
                                    @elseif ($surat->status == 3)
                                        Ditolak
                                    @endif
                                </strong>
                            </td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="/dashboardAdmin" class="btn btn-secondary float-end">Kembali</a>
        </div>
    </div>
</div>
@endsection
