@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-upload"></i> Buat Surat
                </div>
                <div class="card-body">
                    <form action="/prosesUpload" method="POST" id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_kirim" name="tanggal_kirim" required>
                        </div>
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada" required>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" required>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Isi Surat</label>
                            <textarea class="form-control" id="summernote" name="isi_surat" style="height: 200px; visibility: hidden;" required=""></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group" role="group" aria-label="View and Save Buttons">
                                <a href="{{ route('viewSurat') }}" class="btn btn-info mr-2">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-upload"></i> Save
                                </button>
                            </div>
                            <div class="ml-3">
                                <a href="{{ route('pratinjauSurat') }}" class="btn btn-success">
                                    <i class="fas fa-paper-plane"></i> Kirim Surat
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="/dashboardAdmin" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil notifikasi sukses dari session
            var successMessage = '{{ session('success') }}';
    
            // Periksa apakah ada notifikasi sukses
            if (successMessage) {
                // Tampilkan notifikasi
                alert(successMessage);
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage,
                    showConfirmButton: false,
                    timer: 2000 // Durasi notifikasi dalam milidetik
                });
            }
        });
    </script>
  

</div>
@endsection
