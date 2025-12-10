{{-- HALAMAN CREATE EKSTRAKURIKULER --}}
@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Ekstrakurikuler
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.ekstrakurikuler.index') }}">Ekstrakurikuler</a>
                </li>
                <li class="breadcrumb-item active">Tambah Ekskul</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-file-upload mr-2"></i>Form Tambah Ekstrakurikuler
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

                    <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Nama Ekstrakurikuler <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="nama"
                                   class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                   placeholder="Contoh: Pramuka, Paskibra, Basket..."
                                   value="{{ old('nama') }}"
                                   required>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Berikan nama ekstrakurikuler yang jelas
                            </small>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Upload Gambar
                            </label>
                            <div class="custom-file">
                                <input type="file"
                                       name="gambar"
                                       class="custom-file-input @error('gambar') is-invalid @enderror"
                                       id="imageUpload"
                                       accept="image/*">
                                <label class="custom-file-label" for="imageUpload">Pilih gambar...</label>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG. Maksimal 2MB (Opsional)
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

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi Singkat</label>
                            <textarea name="deskripsi"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Jelaskan tentang kegiatan ekstrakurikuler ini...">{{ old('deskripsi') }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Deskripsikan tujuan dan kegiatan ekstrakurikuler
                            </small>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pembina</label>
                            <input type="text"
                                   name="pembina"
                                   class="form-control @error('pembina') is-invalid @enderror"
                                   placeholder="Contoh: Bapak/Ibu..."
                                   value="{{ old('pembina') }}">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Nama guru pembina ekstrakurikuler
                            </small>
                            @error('pembina')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jadwal Kegiatan</label>
                            <input type="text"
                                   name="jadwal"
                                   class="form-control @error('jadwal') is-invalid @enderror"
                                   placeholder="Contoh: Senin & Rabu, 15:00 - 17:00"
                                   value="{{ old('jadwal') }}">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Jadwal pelaksanaan kegiatan ekstrakurikuler
                            </small>
                            @error('jadwal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save mr-2"></i>Simpan Ekstrakurikuler
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
                        <i class="fas fa-info-circle mr-2"></i>Panduan Pengisian
                    </h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold text-primary">
                        <i class="fas fa-check-circle mr-2"></i>Tips Menambah Ekskul
                    </h6>
                    <ul class="small text-muted mb-3">
                        <li>Nama ekstrakurikuler harus jelas dan mudah dimengerti</li>
                        <li>Gunakan foto yang relevan dengan kegiatan</li>
                        <li>Deskripsi singkat namun informatif</li>
                        <li>Cantumkan nama pembina jika sudah ada</li>
                        <li>Jadwal sebaiknya detail (hari dan jam)</li>
                    </ul>

                    <h6 class="font-weight-bold text-success mt-4">
                        <i class="fas fa-lightbulb mr-2"></i>Contoh Ekstrakurikuler
                    </h6>
                    <div class="small text-muted">
                        <p class="mb-2">
                            <strong>🏃 Olahraga:</strong> Basket, Futsal, Voli, Badminton
                        </p>
                        <p class="mb-2">
                            <strong>🎨 Seni:</strong> Seni Musik, Teater, Tari, Paduan Suara
                        </p>
                        <p class="mb-2">
                            <strong>🎯 Organisasi:</strong> Pramuka, Paskibra, PMR, OSIS
                        </p>
                        <p class="mb-0">
                            <strong>💻 Teknologi:</strong> Robotika, Multimedia, Coding
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Tips -->
            <div class="card shadow mb-4 border-left-warning">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Catatan Penting
                    </h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted">
                        <p class="mb-2">
                            <i class="fas fa-asterisk text-danger mr-1"></i>
                            <strong>Field bertanda (*)</strong> wajib diisi
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-image text-info mr-1"></i>
                            Gambar bersifat opsional namun sangat disarankan
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-save text-success mr-1"></i>
                            Data dapat diedit kembali setelah disimpan
                        </p>
                    </div>
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
        $('.custom-file-label').html('Pilih gambar...');
        $('#imagePreviewContainer').fadeOut();
    });

    // Form validation
    $('#createForm').on('submit', function(e) {
        if ($('input[name="nama"]').val().trim() === '') {
            e.preventDefault();
            alert('Nama ekstrakurikuler harus diisi!');
            return false;
        }
    });
});
</script>
@endpush
@endsection
