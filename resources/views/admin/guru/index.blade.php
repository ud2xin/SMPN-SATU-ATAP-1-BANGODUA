@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chalkboard-teacher mr-2"></i>Manajemen Data Guru
        </h1>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Guru Baru
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
                                Total Guru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guru->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Guru Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guru->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                                Data Terbaru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $guru->first() ? $guru->first()->created_at->format('d M Y') : '-' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Teachers Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Guru
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
                            <th width="8%">Urut</th>
                            <th width="12%">Foto</th>
                            <th width="20%">Nama Guru</th>
                            <th width="20%">Jabatan/Mapel</th>
                            <th width="15%">No. Telp</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($guru as $item)
                        <tr>
                            <td class="align-middle">
                                <span class="badge badge-secondary badge-pill">#{{ $item->urut }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="teacher-preview">
                                    <img src="{{ asset('storage/'.$item->foto) }}"
                                            class="img-thumbnail shadow-sm"
                                            width="80"
                                            style="cursor: pointer; object-fit: cover; height: 80px;"
                                            data-toggle="modal"
                                            data-target="#previewModal{{ $item->id }}">
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="font-weight-bold text-gray-800">{{ $item->nama }}</div>
                                @if($item->keterangan)
                                    <small class="text-muted">{{ Str::limit($item->keterangan, 30) }}</small>
                                @endif
                            </td>
                            <td class="align-middle">
                                <span class="badge badge-info badge-pill">
                                    <i class="fas fa-book-reader mr-1"></i>{{ $item->jabatan ?: 'Belum diisi' }}
                                </span>
                            </td>
                            <td class="align-middle">
                                @if($item->notelp)
                                    <i class="fas fa-phone-alt text-success mr-1"></i>
                                    <span class="text-muted">{{ $item->notelp }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.guru.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm"
                                        data-toggle="tooltip"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.guru.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Yakin ingin menghapus guru ini?\n\nNama: {{ $item->nama }}')"
                                                class="btn btn-danger btn-sm"
                                                data-toggle="tooltip"
                                                title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Preview Modal -->
                        <div class="modal fade" id="previewModal{{ $item->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <i class="fas fa-user-circle mr-2"></i>{{ $item->nama }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/'.$item->foto) }}"
                                                class="img-fluid rounded shadow mb-3">
                                        <div class="text-left">
                                            <p class="mb-2">
                                                <strong>Jabatan/Mapel:</strong>
                                                <span class="text-muted">{{ $item->jabatan ?: '-' }}</span>
                                            </p>
                                            <p class="mb-2">
                                                <strong>No. Telp:</strong>
                                                <span class="text-muted">{{ $item->notelp ?: '-' }}</span>
                                            </p>
                                            @if($item->keterangan)
                                                <p class="mb-0">
                                                    <strong>Keterangan:</strong><br>
                                                    <span class="text-muted">{{ $item->keterangan }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-user-slash fa-3x text-gray-300 mb-3"></i>
                                <p class="text-muted">Belum ada data guru</p>
                                <a href="{{ route('admin.guru.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-2"></i>Tambah Guru Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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
