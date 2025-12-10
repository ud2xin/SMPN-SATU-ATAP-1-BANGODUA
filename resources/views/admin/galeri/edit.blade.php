@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Foto Galeri
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.galeri.index') }}">Galeri</a>
                </li>
                <li class="breadcrumb-item active">Edit Foto</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-edit mr-2"></i>Form Edit Foto
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

                    <form action="{{ route('admin.galeri.update', $data->id) }}"
                          method="POST"
                          enctype="multipart/form-data"
                          id="editForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Judul Foto <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="judul"
                                   class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $data->judul) }}"
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
                                      placeholder="Masukkan deskripsi foto (opsional)...">{{ old('deskripsi', $data->deskripsi) }}</textarea>
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
                                <option value="galeri" {{ old('kategori', $data->kategori) == 'galeri' ? 'selected' : '' }}>
                                    📸 Galeri
                                </option>
                                <option value="kegiatan" {{ old('kategori', $data->kategori) == 'kegiatan' ? 'selected' : '' }}>
                                    📅 Kegiatan
                                </option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar Saat Ini</label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img src="{{ asset('storage/'.$data->gambar) }}"
                                     class="img-thumbnail shadow-sm"
                                     id="currentImage"
                                     style="max-width: 300px; max-height: 300px; object-fit: cover;"
                                     data-toggle="modal"
                                     data-target="#currentImageModal">
                                <div class="mt-2">
                                    <button type="button"
                                            class="btn btn-sm btn-info"
                                            data-toggle="modal"
                                            data-target="#currentImageModal">
                                        <i class="fas fa-search-plus mr-1"></i>Lihat Full Size
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fas fa-sync-alt mr-2"></i>Ganti Gambar (Opsional)
                            </label>
                            <div class="custom-file">
                                <input type="file"
                                       name="gambar"
                                       class="custom-file-input @error('gambar') is-invalid @enderror"
                                       id="imageUpload"
                                       accept="image/*">
                                <label class="custom-file-label" for="imageUpload">Pilih gambar baru...</label>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti gambar.
                            </small>
                        </div>

                        <!-- New Image Preview -->
                        <div class="form-group" id="newImagePreviewContainer" style="display: none;">
                            <label class="font-weight-bold">
                                <span class="badge badge-success">NEW</span> Preview Gambar Baru
                            </label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img id="newImagePreview"
                                     src=""
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 300px;">
                                <button type="button"
                                        class="btn btn-sm btn-danger mt-2"
                                        id="removeNewImage">
                                    <i class="fas fa-times mr-1"></i>Batal Ganti Gambar
                                </button>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <div>
                                <button type="button"
                                        class="btn btn-outline-danger mr-2"
                                        data-toggle="modal"
                                        data-target="#deleteModal">
                                    <i class="fas fa-trash mr-2"></i>Hapus Foto
                                </button>
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-save mr-2"></i>Update Foto
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-4">
            <!-- Info Card -->
            <div class="card shadow mb-4 border-left-warning">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-info-circle mr-2"></i>Informasi Foto
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">ID Foto</small>
                        <span class="badge badge-secondary">#{{ $data->id }}</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Kategori Saat Ini</small>
                        @if($data->kategori == 'galeri')
                            <span class="badge badge-success">
                                <i class="fas fa-images mr-1"></i>Galeri
                            </span>
                        @else
                            <span class="badge badge-info">
                                <i class="fas fa-calendar-check mr-1"></i>Kegiatan
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Diupload Pada</small>
                        <i class="far fa-calendar-alt text-primary mr-1"></i>
                        {{ $data->created_at->format('d M Y, H:i') }}
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <i class="far fa-clock text-success mr-1"></i>
                        {{ $data->updated_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-lightbulb mr-2"></i>Tips Edit Foto
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="small text-muted mb-0">
                        <li class="mb-2">Klik gambar untuk melihat ukuran penuh</li>
                        <li class="mb-2">Upload gambar baru hanya jika ingin menggantinya</li>
                        <li class="mb-2">Pastikan gambar baru berkualitas baik</li>
                        <li class="mb-0">Gambar lama akan terhapus otomatis saat diganti</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Current Image Modal -->
<div class="modal fade" id="currentImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-image mr-2"></i>{{ $data->judul }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-0">
                <img src="{{ asset('storage/'.$data->gambar) }}"
                     class="img-fluid"
                     style="width: 100%; height: auto;">
            </div>
            <div class="modal-footer">
                @if($data->deskripsi)
                    <div class="text-left w-100">
                        <small class="text-muted">{{ $data->deskripsi }}</small>
                    </div>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Apakah Anda yakin ingin menghapus foto ini?</p>
                <div class="alert alert-warning mt-3 mb-0">
                    <strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan!
                    <br><strong>Foto:</strong> {{ $data->judul }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('admin.galeri.destroy', $data->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i>Ya, Hapus!
                    </button>
                </form>
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

        // Show new image preview
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#newImagePreview').attr('src', e.target.result);
                $('#newImagePreviewContainer').fadeIn();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Remove new image preview
    $('#removeNewImage').on('click', function() {
        $('#imageUpload').val('');
        $('#imageUpload').next('.custom-file-label').html('Pilih gambar baru...');
        $('#newImagePreviewContainer').fadeOut();
    });

    // Form validation
    $('#editForm').on('submit', function(e) {
        if ($('input[name="judul"]').val().trim() === '') {
            e.preventDefault();
            alert('Judul foto harus diisi!');
            return false;
        }

        if ($('select[name="kategori"]').val() === '') {
            e.preventDefault();
            alert('Kategori harus dipilih!');
            return false;
        }
    });
});
</script>
@endpush
@endsection
