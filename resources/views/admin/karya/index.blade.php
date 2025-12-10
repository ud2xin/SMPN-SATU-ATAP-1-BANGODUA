@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><i class="fas fa-paint-brush mr-2"></i>Manajemen Karya</h1>
        <a href="{{ route('admin.karya.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-1"></i>Tambah Karya
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Karya
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karya->total() }}</div>
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
                                Kategori Siswa
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $karya->where('kategori', 'siswa')->count() }}
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
                                Kategori Guru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $karya->where('kategori', 'guru')->count() }}
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

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Karya</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Jabatan</th>
                            <th>Tanggal</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($karya as $k)
                        <tr>
                            <td>{{ ($karya->currentPage()-1)*$karya->perPage() + $loop->iteration }}</td>
                            <td>{{ $k->nama }}</td>
                            <td class="font-weight-bold">{{ $k->judul }}</td>
                            <td>
                                <span class="badge badge-info">{{ ucfirst($k->kategori) }}</span>
                            </td>
                            <td>{{ $k->jabatan }}</td>
                            <td>{{ $k->tanggal }}</td>
                            <td>
                                <a href="{{ route('admin.karya.edit',$k->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.karya.destroy',$k->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus karya ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

                <div class="d-flex justify-content-end">
                    {{ $karya->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
