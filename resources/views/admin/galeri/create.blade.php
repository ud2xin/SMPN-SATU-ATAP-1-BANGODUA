@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Foto Galeri
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.galeri.index') }}">Galeri</a>
                </li>
                <li class="breadcrumb-item active">Tambah Foto</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-upload mr-2"></i>Form Upload Foto
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

                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Judul Foto <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="judul"
                                   class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                   placeholder="Masukkan judul foto..."
                                   value="{{ old('judul') }}"
                                   required>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Berikan judul yang deskriptif
                            </small>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Masukkan deskripsi foto (opsional)...">{{ old('deskripsi') }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Jelaskan detail tentang foto ini
                            </small>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select name="kategori"
                                    class="form-control form-control-lg @error('kategori') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="galeri" {{ old('kategori') == 'galeri' ? 'selected' : '' }}>
                                    📸 Galeri
                                </option>
                                <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>
                                    📅 Kegiatan
                                </option>
                            </select>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Pilih kategori yang sesuai
                            </small>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Upload Gambar <span class="text-danger">*</span>
                            </label>
                            <div class="custom-file">
                                <input type="file"
                                       name="gambar"
                                       class="custom-file-input @error('gambar') is-invalid @enderror"
                                       id="imageUpload"
                                       accept="image/*"
                                       required>
                                <label class="custom-file-label" for="imageUpload">Pilih file gambar...</label>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG. Maksimal 2MB
                            </small>
                        </div>

                        <!-- Image Preview -->
                        <div class="form-group" id="imagePreviewContainer" style="display: none;">
                            <label class="font-weight-bold">Preview Gambar</label>
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
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i>Simpan Foto
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
                        <i class="fas fa-info-circle mr-2"></i>Panduan Upload
                    </h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold text-primary">
                        <i class="fas fa-check-circle mr-2"></i>Tips Upload Foto
                    </h6>
                    <ul class="small text-muted mb-3">
                        <li>Gunakan foto berkualitas tinggi</li>
                        <li>Pastikan ukuran file tidak lebih dari 2MB</li>
                        <li>Gunakan format JPG atau PNG</li>
                        <li>Berikan judul yang jelas dan deskriptif</li>
                    </ul>

                    <h6 class="font-weight-bold text-success mt-4">
                        <i class="fas fa-images mr-2"></i>Kategori
                    </h6>
                    <div class="small text-muted">
                        <p class="mb-2">
                            <strong>📸 Galeri:</strong> Untuk foto umum galeri sekolah, fasilitas, dll.
                        </p>
                        <p class="mb-0">
                            <strong>📅 Kegiatan:</strong> Untuk foto kegiatan dan event tertentu.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-chart-bar mr-2"></i>Statistik Galeri
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase">
                                Total Foto
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <i class="fas fa-image text-primary mr-2"></i>-
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">
                        <i class="fas fa-info-circle mr-1"></i>Statistik akan terupdate setelah foto disimpan
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
    $('.custom-file-input').on('change', function() {
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
        $('.custom-file-label').html('Pilih file gambar...');
        $('#imagePreviewContainer').fadeOut();
    });

    // Form validation
    $('#uploadForm').on('submit', function(e) {
        let isValid = true;

        if ($('input[name="judul"]').val().trim() === '') {
            isValid = false;
            alert('Judul foto harus diisi!');
        }

        if ($('select[name="kategori"]').val() === '') {
            isValid = false;
            alert('Kategori harus dipilih!');
        }

        if ($('#imageUpload').val() === '') {
            isValid = false;
            alert('Gambar harus diupload!');
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>
@endpush
@endsection
