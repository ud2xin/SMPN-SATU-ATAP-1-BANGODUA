@extends('layouts.sbadmin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Karya</h3>
        <a href="{{ route('admin.karya.create') }}" class="btn btn-primary">+ Tambah Karya</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pemilik</th>
                <th>Kategori</th>
                <th>Foto Pemilik</th>
                <th>Tanggal</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($karyas as $karya)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $karya->judul }}</td>
                <td>{{ $karya->nama }}</td>
                <td>{{ $karya->kategori }}</td>

                <td>
                    <img src="{{ asset('storage/' . $karya->foto_pemilik) }}"
                         class="rounded"
                         width="60">
                </td>

                <td>{{ $karya->tanggal }}</td>

                <td>
                    <a href="{{ route('admin.karya.edit', $karya->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.karya.destroy', $karya->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Belum ada karya.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
