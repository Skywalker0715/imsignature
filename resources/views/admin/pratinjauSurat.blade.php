@extends('layouts.admin')
@section( 'content' )
@if ($surats->isNotEmpty())
<div class="container mt-4">
    <div class="row justify-content-center">
        @foreach ($surats as $surat)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Pratinjau Surat</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
                        <p class="card-text"><strong>Tanggal:</strong> {{ $surat->tanggal_kirim }}</p>
                        <p class="card-text"><strong>Kepada:</strong> {{ $surat->kepada }}</p>
                        <p class="card-text"><strong>Perihal:</strong> {{ $surat->perihal }}</p>
                        <p class="card-text"><strong>Isi Surat:</strong></p>
                        <p style="margin: 0; text-align: left; justify-content: auto; word-break: break-word;">{!! nl2br(html_entity_decode(strip_tags($surat->isi_surat))) !!}</p>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('kirim-surat-notifikasi', ['suratId' => $surat->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-12">
        <a href="{{ route('buatSurat') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
@else
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p class="text-center">Tidak ada surat yang tersedia.</p>
        </div>
    </div>
</div>
@endif

@if (session('success'))
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = '{{ session('success') }}';

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
</script>
@endsection