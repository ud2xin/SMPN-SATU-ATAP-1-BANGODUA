@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-images mr-2"></i>Manajemen Galeri
        </h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Foto Baru
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Foto
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $galeri->total() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Galeri
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $galeri->where('kategori','galeri')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Kegiatan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $galeri->where('kategori','kegiatan')->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Galeri
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Preview</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeri as $g)
                        <tr>
                            <td>#{{ $g->id }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$g->gambar) }}"
                                     width="80" class="img-thumbnail">
                            </td>
                            <td class="font-weight-bold">{{ $g->judul }}</td>
                            <td>{{ Str::limit($g->deskripsi, 50) ?: '-' }}</td>
                            <td>
                                <span class="badge badge-{{ $g->kategori == 'galeri' ? 'success' : 'info' }}">
                                    {{ ucfirst($g->kategori) }}
                                </span>
                            </td>
                            <td>{{ $g->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.galeri.edit',$g->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.galeri.destroy',$g->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus foto ini?')"
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada foto
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Menampilkan {{ $galeri->firstItem() ?? 0 }}
                    – {{ $galeri->lastItem() ?? 0 }}
                    dari {{ $galeri->total() }} foto
                </div>
                <div>
                    {{ $galeri->links() }}
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
