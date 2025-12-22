@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-running mr-2"></i>Manajemen Ekstrakurikuler
        </h1>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Ekstrakurikuler
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
                                Total Ekstrakurikuler
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ekstrakurikuler->total() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                Dengan Pembina
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $ekstrakurikuler->whereNotNull('pembina')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
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
                                Dengan Jadwal
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $ekstrakurikuler->whereNotNull('jadwal')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ekstrakurikuler Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table mr-2"></i>Daftar Ekstrakurikuler
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
                            <th width="12%">Gambar</th>
                            <th width="18%">Nama Ekskul</th>
                            <th width="25%">Deskripsi</th>
                            <th width="15%">Pembina</th>
                            <th width="15%">Jadwal</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ekstrakurikuler as $item)
                        <tr>
                            <td class="align-middle">
                                <span class="badge badge-secondary">#{{ $item->id }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="ekskul-preview">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/'.$item->gambar) }}"
                                             class="img-thumbnail shadow-sm"
                                             width="80"
                                             style="cursor: pointer; object-fit: cover; height: 80px;"
                                             data-toggle="modal"
                                             data-target="#previewModal{{ $item->id }}">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-center"
                                             style="width: 80px; height: 80px;">
                                            <i class="fas fa-image fa-2x text-gray-300"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle font-weight-bold">{{ $item->nama }}</td>
                            <td class="align-middle text-muted">
                                {{ Str::limit($item->deskripsi, 60) ?: '-' }}
                            </td>
                            <td class="align-middle">
                                @if($item->pembina)
                                    <span class="text-success">
                                        <i class="fas fa-user-tie mr-1"></i>{{ $item->pembina }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if($item->jadwal)
                                    <small class="text-primary">
                                        <i class="far fa-clock mr-1"></i>{{ $item->jadwal }}
                                    </small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       data-toggle="tooltip"
                                       title="Edit Ekskul">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus ekstrakurikuler ini?\n\nNama: {{ $item->nama }}')"
                                                class="btn btn-danger btn-sm"
                                                data-toggle="tooltip"
                                                title="Hapus Ekskul">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Preview Modal -->
                        @if($item->gambar)
                        <div class="modal fade" id="previewModal{{ $item->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <i class="fas fa-running mr-2"></i>{{ $item->nama }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/'.$item->gambar) }}"
                                             class="img-fluid rounded shadow">
                                        @if($item->deskripsi)
                                            <p class="mt-3 text-muted">{{ $item->deskripsi }}</p>
                                        @endif
                                        @if($item->pembina)
                                            <div class="mt-2">
                                                <span class="badge badge-success">
                                                    <i class="fas fa-user-tie mr-1"></i>Pembina: {{ $item->pembina }}
                                                </span>
                                            </div>
                                        @endif
                                        @if($item->jadwal)
                                            <div class="mt-2">
                                                <span class="badge badge-primary">
                                                    <i class="far fa-clock mr-1"></i>{{ $item->jadwal }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-running fa-3x text-gray-300 mb-3"></i>
                                <p class="text-muted">Belum ada ekstrakurikuler</p>
                                <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-2"></i>Tambah Ekstrakurikuler Pertama
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
                    <strong>{{ $ekstrakurikuler->firstItem() ?? 0 }}</strong>
                    –
                    <strong>{{ $ekstrakurikuler->lastItem() ?? 0 }}</strong>
                    dari
                    <strong>{{ $ekstrakurikuler->total() }}</strong>
                    ekstrakurikuler
                </div>
                <div>
                    {{ $ekstrakurikuler->onEachSide(1)->links() }}
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
