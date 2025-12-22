@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-images mr-2"></i>Manajemen Galeri
        </h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Foto Baru
        </a>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Foto
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galeri->total() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Kategori Galeri
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $galeri->where('kategori', 'galeri')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-photo-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kategori Kegiatan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $galeri->where('kategori', 'kegiatan')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Foto Galeri
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Aksi:</div>
                    <a class="dropdown-item" href="#"><i class="fas fa-download mr-2"></i>Export Data</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-filter mr-2"></i>Filter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="12%">Preview</th>
                            <th width="20%">Judul</th>
                            <th width="25%">Deskripsi</th>
                            <th width="10%">Kategori</th>
                            <th width="13%">Tanggal</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $g)
                        <tr>
                            <td class="align-middle">
                                <span class="badge badge-secondary">#{{ $g->id }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="gallery-preview">
                                    <img src="{{ asset('storage/'.$g->gambar) }}"
                                            class="img-thumbnail shadow-sm"
                                            width="80"
                                            style="cursor: pointer; object-fit: cover; height: 80px;"
                                            data-toggle="modal"
                                            data-target="#previewModal{{ $g->id }}">
                                </div>
                            </td>
                            <td class="align-middle font-weight-bold">{{ $g->judul }}</td>
                            <td class="align-middle text-muted">
                                {{ Str::limit($g->deskripsi, 50) ?: '-' }}
                            </td>
                            <td class="align-middle">
                                @if($g->kategori == 'galeri')
                                    <span class="badge badge-success">
                                        <i class="fas fa-images mr-1"></i>Galeri
                                    </span>
                                @else
                                    <span class="badge badge-info">
                                        <i class="fas fa-calendar-check mr-1"></i>Kegiatan
                                    </span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <small class="text-muted">
                                    <i class="far fa-clock mr-1"></i>{{ $g->created_at->format('d M Y') }}
                                </small>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.galeri.edit', $g->id) }}"
                                        class="btn btn-warning btn-sm"
                                        data-toggle="tooltip"
                                        title="Edit Foto">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.galeri.destroy', $g->id) }}"
                                            method="POST"
                                            class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus foto ini?\n\nJudul: {{ $g->judul }}')"
                                                class="btn btn-danger btn-sm"
                                                data-toggle="tooltip"
                                                title="Hapus Foto">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Preview Modal -->
                        <div class="modal fade" id="previewModal{{ $g->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $g->judul }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/'.$g->gambar) }}"
                                                class="img-fluid rounded shadow">
                                        @if($g->deskripsi)
                                            <p class="mt-3 text-muted">{{ $g->deskripsi }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-image fa-3x text-gray-300 mb-3"></i>
                                <p class="text-muted">Belum ada foto dalam galeri</p>
                                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-2"></i>Tambah Foto Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
                <div class="text-muted small">
                    Menampilkan
                    <strong>{{ $galeri->firstItem() ?? 0 }}</strong>
                    –
                    <strong>{{ $galeri->lastItem() ?? 0 }}</strong>
                    dari
                    <strong>{{ $galeri->total() }}</strong>
                    foto
                </div>
                <div>
                    {{ $galeri->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endpush
@endsection
