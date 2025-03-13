@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Admin</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-envelope fa-2x"></i> <!-- Ikon untuk buat surat -->
                    Buat Surat
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/buatSurat">Buat Surat Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-history fa-2x"></i> <!-- Ikon untuk riwayat pengiriman -->
                    Riwayat Pengiriman
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/riwayat">Lihat Riwayat</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-inbox fa-2x"></i> <!-- Ikon untuk surat masuk -->
                    Surat Masuk
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/suratMasuk">Buka Surat</a>
                </div>
            </div>
        </div>
        <!-- Tambahkan card lainnya untuk fitur lainnya jika diperlukan -->
    </div>
</div>
@endsection
