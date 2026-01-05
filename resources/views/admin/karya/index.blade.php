@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-palette mr-2"></i>Manajemen Karya
        </h1>
        <a href="{{ route('admin.karya.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Karya
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Karya
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $karyas->total() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Karya Siswa
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $karyas->where('kategori', 'karya_siswa')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Karya Guru
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $karyas->where('kategori', 'karya_guru')->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Karya
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Pemilik</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($karyas as $karya)
                            <tr>
                                <td>
                                    {{ ($karyas->currentPage() - 1) * $karyas->perPage() + $loop->iteration }}
                                </td>

                                <td>
                                    <img src="{{ asset('storage/'.$karya->foto_pemilik) }}"
                                         width="70" class="rounded shadow-sm">
                                </td>

                                <td class="font-weight-bold">{{ $karya->judul }}</td>
                                <td>{{ $karya->nama }}</td>

                                <td>
                                    @if($karya->kategori === 'karya_siswa')
                                        <span class="badge badge-primary">Siswa</span>
                                    @elseif($karya->kategori === 'karya_guru')
                                        <span class="badge badge-success">Guru</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $karya->kategori }}</span>
                                    @endif
                                </td>

                                <td>{{ \Carbon\Carbon::parse($karya->tanggal)->format('d M Y') }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.karya.edit', $karya->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.karya.destroy', $karya->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus karya ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada karya
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                @if($karyas->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">
                        Menampilkan {{ $karyas->firstItem() }} – {{ $karyas->lastItem() }}
                        dari {{ $karyas->total() }} karya
                    </div>

                    <nav>
                        <ul class="pagination mb-0">
                            {{-- Prev --}}
                            <li class="page-item {{ $karyas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $karyas->previousPageUrl() }}">
                                    ‹ Sebelumnya
                                </a>
                            </li>

                            {{-- Pages --}}
                            @foreach(range(1, $karyas->lastPage()) as $page)
                                <li class="page-item {{ $page == $karyas->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $karyas->url($page) }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- Next --}}
                            <li class="page-item {{ $karyas->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $karyas->nextPageUrl() }}">
                                    Selanjutnya ›
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection
