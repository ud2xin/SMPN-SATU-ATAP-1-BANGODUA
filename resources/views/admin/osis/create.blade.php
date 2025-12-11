@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus mr-2"></i>Tambah Anggota OSIS
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.osis.index') }}">OSIS</a>
                </li>
                <li class="breadcrumb-item active">Tambah Anggota</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user-edit mr-2"></i>Form Data Anggota
                    </h6>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-exclamation-triangle mr-2"></i>Terdapat kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.osis.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            id="createForm">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                    name="nama"
                                    class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                    placeholder="Masukkan nama lengkap anggota..."
                                    value="{{ old('nama') }}"
                                    required>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Masukkan nama lengkap sesuai identitas
                            </small>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jabatan</label>
                            <input type="text"
                                    name="jabatan"
                                    class="form-control @error('jabatan') is-invalid @enderror"
                                    placeholder="Contoh: Ketua OSIS, Wakil Ketua, Sekretaris, dll..."
                                    value="{{ old('jabatan') }}">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Kosongkan jika belum memiliki jabatan
                            </small>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Urutan Tampilan <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                    name="urut"
                                    class="form-control @error('urut') is-invalid @enderror"
                                    value="{{ old('urut', 0) }}"
                                    min="0"
                                    required>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Angka lebih kecil akan ditampilkan lebih dulu
                            </small>
                            @error('urut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Foto Profil</label>
                            <div class="custom-file">
                                <input type="file"
                                        name="foto"
                                        class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="fotoUpload"
                                        accept="image/*">
                                <label class="custom-file-label" for="fotoUpload">Pilih foto profil...</label>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG. Maksimal 2MB. Disarankan foto formal dengan background polos.
                            </small>
                        </div>

                        <!-- Image Preview -->
                        <div class="form-group" id="fotoPreviewContainer" style="display: none;">
                            <label class="font-weight-bold">Preview Foto</label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img id="fotoPreview"
                                        src=""
                                        class="rounded-circle shadow-sm"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                <button type="button"
                                        class="btn btn-sm btn-danger mt-2 d-block mx-auto"
                                        id="removeFoto">
                                    <i class="fas fa-times mr-1"></i>Hapus Preview
                                </button>
                            </div>
                        </div>

                        

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.osis.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i>Simpan Anggota
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-info-circle mr-2"></i>Panduan Input Data
                    </h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold text-primary">
                        <i class="fas fa-check-circle mr-2"></i>Tips Input Data
                    </h6>
                    <ul class="small text-muted mb-3">
                        <li>Pastikan nama lengkap sesuai identitas resmi</li>
                        <li>Gunakan foto formal dengan background polos</li>
                        <li>Ukuran foto sebaiknya 1:1 (persegi)</li>
                        <li>Atur urutan sesuai hierarki jabatan</li>
                    </ul>

                    <h6 class="font-weight-bold text-success mt-4">
                        <i class="fas fa-list-ol mr-2"></i>Contoh Urutan
                    </h6>
                    <div class="small text-muted">
                        <p class="mb-1"><strong>0:</strong> Ketua OSIS</p>
                        <p class="mb-1"><strong>1:</strong> Wakil Ketua</p>
                        <p class="mb-1"><strong>2:</strong> Sekretaris</p>
                        <p class="mb-0"><strong>3:</strong> Bendahara, dst.</p>
                    </div>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-chart-bar mr-2"></i>Info OSIS
                    </h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-2">
                        <i class="fas fa-users mr-2 text-primary"></i>
                        Anggota akan ditampilkan di halaman Struktur OSIS website
                    </p>
                    <p class="small text-muted mb-0">
                        <i class="fas fa-sort-amount-down mr-2 text-success"></i>
                        Urutan menentukan posisi tampilan di website
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Custom file input label
    $('#fotoUpload').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);

        // Show image preview
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoPreview').attr('src', e.target.result);
                $('#fotoPreviewContainer').fadeIn();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Remove image preview
    $('#removeFoto').on('click', function() {
        $('#fotoUpload').val('');
        $('#fotoUpload').next('.custom-file-label').html('Pilih foto profil...');
        $('#fotoPreviewContainer').fadeOut();
    });

    // Form validation
    $('#createForm').on('submit', function(e) {
        if ($('input[name="nama"]').val().trim() === '') {
            e.preventDefault();
            alert('Nama lengkap harus diisi!');
            return false;
        }
    });
});
</script>
@endpush
@endsection
