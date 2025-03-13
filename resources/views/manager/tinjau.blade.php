@extends('layouts.manager')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h5 class="m-0">Daftar Surat Masuk</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover bg-light">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Kepada</th>
                        <th>Perihal</th>
                        <th>Isi Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nomor_surat }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->tanggal_kirim)) }}</td>
                        <td>{{ $item->kepada }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td> 
                            <p class="mb-0 text-wrap">{{ nl2br(html_entity_decode(strip_tags($item->isi_surat))) }}</p>
                        </td>
                        <td class="{{ $item->status == 1 ? 'text-warning font-weight-bold' : ($item->status == 2 ? 'text-success font-weight-bold' : 'text-danger font-weight-bold') }}">
                            @if ($item->status == 1)
                                <strong>Dikirim</strong>
                            @elseif ($item->status == 2)
                                <strong>Diterima</strong>
                            @elseif ($item->status == 3)
                                <strong>Ditolak</strong>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('prosesTinjau', $item->id) }}" class="btn btn-primary btn-sm"><strong>Tinjau</strong></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="/dashboardManager" class="btn btn-secondary float-end">Kembali</a>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var successMessage = '{{ session('success') }}';
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: successMessage,
            showConfirmButton: false,
            timer: 2000
        });
    }
});
</script>
@endsection
