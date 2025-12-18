@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus mr-2"></i>Tambah Guru Baru
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.guru.index') }}">Data Guru</a>
                </li>
                <li class="breadcrumb-item active">Tambah Guru</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-upload mr-2"></i>Form Tambah Data Guru
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

                    <form action="{{ route('admin.guru.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            id="createForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        Urutan <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                            name="urut"
                                            class="form-control form-control-lg @error('urut') is-invalid @enderror"
                                            placeholder="Contoh: 0,1,2,..."
                                            value="{{ old('urut') }}"
                                            required>
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle mr-1"></i>Nomor urut tampilan guru
                                    </small>
                                    @error('urut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                            name="nama"
                                            class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                            placeholder="Masukkan nama lengkap guru..."
                                            value="{{ old('nama') }}"
                                            required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Jabatan/Mata Pelajaran</label>
                                    <input type="text"
                                            name="jabatan"
                                            class="form-control @error('jabatan') is-invalid @enderror"
                                            placeholder="Contoh: Kepala Sekolah, Wakil Kepala Sekolah, Guru Matematika"
                                            value="{{ old('jabatan') }}">
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle mr-1"></i>Jabatan atau mata pelajaran yang diampu
                                    </small>
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">No. Telepon</label>
                                    <input type="text"
                                            name="notelp"
                                            class="form-control @error('notelp') is-invalid @enderror"
                                            placeholder="Contoh: 081234567890"
                                            value="{{ old('notelp') }}">
                                    @error('notelp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <textarea name="keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror"
                                        rows="4"
                                        placeholder="Masukkan keterangan tambahan (opsional)...">{{ old('keterangan') }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Informasi tambahan tentang guru
                            </small>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Upload Foto <span class="text-danger">*</span>
                            </label>
                            <div class="custom-file">
                                <input type="file"
                                        name="foto"
                                        class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="imageUpload"
                                        accept="image/*"
                                        required>
                                <label class="custom-file-label" for="imageUpload">Pilih file foto...</label>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG, WEBP. Maksimal 2MB
                            </small>
                        </div>

                        <!-- Image Preview -->
                        <div class="form-group" id="imagePreviewContainer" style="display: none;">
                            <label class="font-weight-bold">Preview Foto</label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img id="imagePreview"
                                        src=""
                                        class="img-fluid rounded shadow-sm"
                                        style="max-height: 300px;">
                                <button type="button"
                                        class="btn btn-sm btn-danger mt-2"
                                        id="removeImage">
                                    <i class="fas fa-times mr-1"></i>Hapus Preview
                                </button>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i>Simpan Data
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
                        <i class="fas fa-check-circle mr-2"></i>Tips Input Data Guru
                    </h6>
                    <ul class="small text-muted mb-3">
                        <li>Pastikan nama guru ditulis lengkap</li>
                        <li>Gunakan foto dengan kualitas baik</li>
                        <li>Ukuran file foto maksimal 2MB</li>
                        <li>Format foto: JPG, PNG, JPEG, atau WEBP</li>
                        <li>Urutan digunakan untuk mengatur tampilan</li>
                    </ul>

                    <h6 class="font-weight-bold text-success mt-4">
                        <i class="fas fa-lightbulb mr-2"></i>Informasi
                    </h6>
                    <div class="small text-muted">
                        <p class="mb-2">
                            <strong>Urutan:</strong> Nomor urut menentukan posisi tampilan guru di halaman depan.
                        </p>
                        <p class="mb-2">
                            <strong>Jabatan/Mata Pelajaran:</strong> Isi dengan jabatan atau mata pelajaran yang diampu.
                        </p>
                        <p class="mb-0">
                            <strong>Keterangan:</strong> Opsional, bisa diisi dengan informasi tambahan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-user-check mr-2"></i>Wajib Diisi
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="small text-muted mb-0">
                        <li class="mb-2">
                            <i class="fas fa-asterisk text-danger mr-2" style="font-size: 8px;"></i>
                            <strong>Urutan</strong> - Nomor urut tampilan
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-asterisk text-danger mr-2" style="font-size: 8px;"></i>
                            <strong>Nama Lengkap</strong> - Nama guru
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-asterisk text-danger mr-2" style="font-size: 8px;"></i>
                            <strong>Foto</strong> - Foto profil guru
                        </li>
                    </ul>
                    <hr>
                    <small class="text-muted">
                        <i class="fas fa-info-circle mr-1"></i>Field bertanda <span class="text-danger">*</span> wajib diisi
                    </small>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Custom file input label
    $('#imageUpload').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);

        // Show image preview
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').fadeIn();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Remove image preview
    $('#removeImage').on('click', function() {
        $('#imageUpload').val('');
        $('#imageUpload').next('.custom-file-label').html('Pilih file foto...');
        $('#imagePreviewContainer').fadeOut();
    });

    // Form validation
    $('#createForm').on('submit', function(e) {
        let isValid = true;

        if ($('input[name="nama"]').val().trim() === '') {
            isValid = false;
            alert('Nama guru harus diisi!');
        }

        if ($('input[name="urut"]').val().trim() === '') {
            isValid = false;
            alert('Urutan harus diisi!');
        }

        if ($('#imageUpload').val() === '') {
            isValid = false;
            alert('Foto guru harus diupload!');
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>
@endpush
@endsection
