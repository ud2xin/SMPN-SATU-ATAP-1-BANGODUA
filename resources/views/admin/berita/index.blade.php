@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-newspaper mr-2"></i>Manajemen Berita
        </h1>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
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
                                Total Berita
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita->total() }}</div>
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
                                Kategori Berita
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $berita->where('kategori', 'berita')->count() }}
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
                                Kategori Prestasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $berita->where('kategori', 'prestasi')->count() }}
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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Berita
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Diposting</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $b)
                        <tr>
                            {{-- Index berita berdasarkan pagination --}}
                            <td>{{ ($berita->currentPage() - 1) * $berita->perPage() + $loop->iteration }}</td>

                            <td>
                                <img src="{{ asset('storage/'.$b->galeri->gambar) }}"
                                     width="80" class="rounded shadow-sm">
                            </td>

                            <td class="font-weight-bold">{{ $b->judul }}</td>

                            <td>{{ $b->user->name }}</td>

                            <td>
                                @if($b->kategori == 'berita')
                                    <span class="badge badge-primary">Berita</span>
                                @else
                                    <span class="badge badge-success">Prestasi</span>
                                @endif
                            </td>

                            <td>{{ $b->created_at->format('d M Y') }}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus berita ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                Belum ada berita
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Simple Pagination --}}
                @if($berita->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Menampilkan {{ $berita->firstItem() }} - {{ $berita->lastItem() }} dari {{ $berita->total() }} berita
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            {{-- Previous Button --}}
                            @if($berita->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">‹ Sebelumnya</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $berita->previousPageUrl() }}">‹ Sebelumnya</a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach(range(1, $berita->lastPage()) as $page)
                                @if($page == $berita->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $berita->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Button --}}
                            @if($berita->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $berita->nextPageUrl() }}">Selanjutnya ›</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Selanjutnya ›</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection