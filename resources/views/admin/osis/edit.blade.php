@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Anggota OSIS
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.osis.index') }}">OSIS</a>
                </li>
                <li class="breadcrumb-item active">Edit Anggota</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-edit mr-2"></i>Form Edit Anggota OSIS
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

                    <form action="{{ route('admin.osis.update', $osis->id) }}"
                            method="POST"
                            enctype="multipart/form-data"
                            id="editForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                    name="nama"
                                    class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $osis->nama) }}"
                                    required>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Nama lengkap anggota OSIS
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
                                    placeholder="Contoh: Ketua, Wakil Ketua, Sekretaris..."
                                    value="{{ old('jabatan', $osis->jabatan) }}">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Jabatan dalam struktur organisasi OSIS
                            </small>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Urutan Tampilan</label>
                            <input type="number"
                                    name="urut"
                                    class="form-control @error('urut') is-invalid @enderror"
                                    placeholder="Contoh: 1, 2, 3..."
                                    value="{{ old('urut', $osis->urut) }}"
                                    min="0">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Urutan tampilan di halaman depan (semakin kecil semakin awal)
                            </small>
                            @error('urut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($osis->foto)
                        <div class="form-group">
                            <label class="font-weight-bold">Foto Saat Ini</label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img src="{{ asset('storage/'.$osis->foto) }}"
                                        class="img-thumbnail shadow-sm"
                                        id="currentImage"
                                        style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 10px;"
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
                        @endif

                        <div class="form-group">
                            <label class="font-weight-bold">
                                <i class="fas fa-sync-alt mr-2"></i>{{ $osis->foto ? 'Ganti Foto (Opsional)' : 'Upload Foto' }}
                            </label>
                            <div class="custom-file">
                                <input type="file"
                                        name="foto"
                                        class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="imageUpload"
                                        accept="image/*">
                                <label class="custom-file-label" for="imageUpload">Pilih foto...</label>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, JPEG. Maksimal 2MB. {{ $osis->foto ? 'Kosongkan jika tidak ingin mengganti.' : '' }}
                            </small>
                        </div>

                        <!-- New Image Preview -->
                        <div class="form-group" id="newImagePreviewContainer" style="display: none;">
                            <label class="font-weight-bold">
                                <span class="badge badge-success">NEW</span> Preview Foto Baru
                            </label>
                            <div class="border rounded p-3 text-center bg-light">
                                <img id="newImagePreview"
                                        src=""
                                        class="img-fluid rounded shadow-sm"
                                        style="max-height: 250px; border-radius: 10px;">
                                <button type="button"
                                        class="btn btn-sm btn-danger mt-2"
                                        id="removeNewImage">
                                    <i class="fas fa-times mr-1"></i>Batal Ganti Foto
                                </button>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.osis.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <div>
                                <button type="button"
                                        class="btn btn-outline-danger mr-2"
                                        data-toggle="modal"
                                        data-target="#deleteModal">
                                    <i class="fas fa-trash mr-2"></i>Hapus Anggota
                                </button>
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-save mr-2"></i>Update Data
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
                        <i class="fas fa-info-circle mr-2"></i>Informasi Anggota
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">ID Anggota</small>
                        <span class="badge badge-secondary">#{{ $osis->id }}</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Nama Saat Ini</small>
                        <span class="text-dark font-weight-bold">{{ $osis->nama }}</span>
                    </div>
                    @if($osis->jabatan)
                    <div class="mb-3">
                        <small class="text-muted d-block">Jabatan Saat Ini</small>
                        <span class="badge badge-primary">
                            <i class="fas fa-user-tie mr-1"></i>{{ $osis->jabatan }}
                        </span>
                    </div>
                    @endif
                    <div class="mb-3">
                        <small class="text-muted d-block">Status</small>
                        @if($osis->is_active)
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                <i class="fas fa-times-circle mr-1"></i>Nonaktif
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Ditambahkan Pada</small>
                        <i class="far fa-calendar-alt text-primary mr-1"></i>
                        {{ $osis->created_at->format('d M Y, H:i') }}
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <i class="far fa-clock text-success mr-1"></i>
                        {{ $osis->updated_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-lightbulb mr-2"></i>Tips Edit Data
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="small text-muted mb-0">
                        <li class="mb-2">Pastikan nama dan jabatan sesuai dengan struktur organisasi</li>
                        <li class="mb-2">Gunakan foto formal dengan latar belakang yang rapi</li>
                        <li class="mb-2">Atur urutan tampilan sesuai hierarki jabatan</li>
                        <li class="mb-2">Nonaktifkan anggota yang sudah tidak menjabat</li>
                        <li class="mb-0">Foto lama akan terhapus otomatis saat diganti</li>
                    </ul>
                </div>
            </div>

            <!-- Jabatan Reference -->
            <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-list mr-2"></i>Referensi Jabatan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted">
                        <p class="mb-2"><strong>Inti:</strong></p>
                        <ul class="mb-3">
                            <li>Ketua</li>
                            <li>Wakil Ketua</li>
                            <li>Sekretaris</li>
                            <li>Bendahara</li>
                        </ul>
                        <p class="mb-2"><strong>Bidang:</strong></p>
                        <ul class="mb-0">
                            <li>Ketua Bidang ...</li>
                            <li>Anggota Bidang ...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Current Image Modal -->
@if($osis->foto)
<div class="modal fade" id="currentImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user mr-2"></i>{{ $osis->nama }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-4">
                <img src="{{ asset('storage/'.$osis->foto) }}"
                        class="img-fluid rounded shadow"
                        style="max-height: 500px;">
                @if($osis->jabatan)
                    <div class="mt-3">
                        <span class="badge badge-primary badge-lg">
                            <i class="fas fa-user-tie mr-1"></i>{{ $osis->jabatan }}
                        </span>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif

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
                <p class="mb-0">Apakah Anda yakin ingin menghapus anggota OSIS ini?</p>
                <div class="alert alert-warning mt-3 mb-0">
                    <strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan!
                    <br><strong>Nama:</strong> {{ $osis->nama }}
                    @if($osis->jabatan)
                        <br><strong>Jabatan:</strong> {{ $osis->jabatan }}
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('admin.osis.destroy', $osis->id) }}" method="POST" class="d-inline">
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
        $('#imageUpload').next('.custom-file-label').html('Pilih foto...');
        $('#newImagePreviewContainer').fadeOut();
    });

    // Update status badge on toggle
    $('#isActive').on('change', function() {
        const badge = $(this).parent().find('.badge');
        if($(this).is(':checked')) {
            badge.removeClass('badge-secondary').addClass('badge-success').text('Aktif');
        } else {
            badge.removeClass('badge-success').addClass('badge-secondary').text('Nonaktif');
        }
    });

    // Form validation
    $('#editForm').on('submit', function(e) {
        if ($('input[name="nama"]').val().trim() === '') {
            e.preventDefault();
            alert('Nama anggota OSIS harus diisi!');
            return false;
        }
    });
});
</script>
@endpush
@endsection
