@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-users mr-2"></i>Struktur OSIS
        </h1>
        <a href="{{ route('admin.osis.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Anggota Baru
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $osis->total() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Anggota Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $osis->where('is_active', 1)->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Dengan Foto
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $osis->whereNotNull('foto')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-portrait fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OSIS Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Anggota OSIS
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
                            <th width="5%">No</th>
                            <th width="10%">Foto</th>
                            <th width="20%">Nama</th>
                            <th width="20%">Jabatan</th>
                            <th width="8%">Urutan</th>
                            <th width="10%">Status</th>
                            <th width="12%">Tanggal</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($osis as $item)
                        <tr>
                            <td class="align-middle">
                                <span class="badge badge-secondary">
                                    #{{ $loop->iteration + ($osis->currentPage()-1)*$osis->perPage() }}
                                </span>
                            </td>
                            <td class="align-middle">
                                <div class="member-preview">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/'.$item->foto) }}"
                                             class="img-thumbnail shadow-sm rounded-circle"
                                             width="60"
                                             height="60"
                                             style="cursor: pointer; object-fit: cover;"
                                             data-toggle="modal"
                                             data-target="#previewModal{{ $item->id }}">
                                    @else
                                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-user fa-2x"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle font-weight-bold">{{ $item->nama }}</td>
                            <td class="align-middle">
                                @if($item->jabatan)
                                    <span class="badge badge-pill badge-primary">
                                        <i class="fas fa-briefcase mr-1"></i>{{ $item->jabatan }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="badge badge-info">{{ $item->urut }}</span>
                            </td>
                            <td class="align-middle">
                                @if($item->is_active)
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle mr-1"></i>Aktif
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-times-circle mr-1"></i>Non-Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <small class="text-muted">
                                    <i class="far fa-clock mr-1"></i>{{ $item->created_at->format('d M Y') }}
                                </small>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.osis.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       data-toggle="tooltip"
                                       title="Edit Anggota">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.osis.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus anggota ini?\n\nNama: {{ $item->nama }}')"
                                                class="btn btn-danger btn-sm"
                                                data-toggle="tooltip"
                                                title="Hapus Anggota">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Preview Modal -->
                        @if($item->foto)
                        <div class="modal fade" id="previewModal{{ $item->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $item->nama }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/'.$item->foto) }}"
                                             class="img-fluid rounded shadow">
                                        @if($item->jabatan)
                                            <p class="mt-3 mb-0">
                                                <span class="badge badge-primary badge-pill">{{ $item->jabatan }}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-users fa-3x text-gray-300 mb-3"></i>
                                <p class="text-muted">Belum ada anggota OSIS terdaftar</p>
                                <a href="{{ route('admin.osis.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-2"></i>Tambah Anggota Pertama
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
                    <strong>{{ $osis->firstItem() ?? 0 }}</strong>
                    –
                    <strong>{{ $osis->lastItem() ?? 0 }}</strong>
                    dari
                    <strong>{{ $osis->total() }}</strong>
                    anggota
                </div>
                <div>
                    {{ $osis->onEachSide(1)->links() }}
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
