@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
     <!-- Menampilkan pesan sukses jika ada -->
     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Surat Masuk</h1>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Daftar Surat Masuk</h5>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratMasuk as $surat)
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
                                    @if ($surat->status == 2)
                                        Diterima
                                    @elseif ($surat->status == 3)
                                        Ditolak
                                    @endif
                                </strong>
                            </td>                            
                            <td>
                                <div class="btn-group btn-group-sm">
                                    @if ($surat->status == 2)
                                    <a href="{{ route('lihatHasilSurat', ['suratId' => $surat->id, 'status' => 'diterima']) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @elseif ($surat->status == 3)
                                    <a href="{{ route('lihatHasilSurat', ['suratId' => $surat->id, 'status' => 'ditolak']) }}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Ditolak">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif
                                    <form action="{{ route('hapusSurat', $surat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="redirect_to" value="{{ request()->routeIs('suratMasuk') ? route('suratMasuk') : route('buatSurat') }}">
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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