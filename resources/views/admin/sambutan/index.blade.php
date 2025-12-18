@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <h4 class="fw-semibold mb-3">Sambutan Kepala Sekolah</h4>

    <div class="card">
        <div class="card-body">

            @if($sambutan)
                <p class="mb-2">
                    <strong>Kepala Sekolah:</strong>
                    {{ $sambutan->kepalaGuru->nama ?? '-' }}
                </p>

                <div class="border p-3">
                    {!! $sambutan->sambutan_kepala !!}
                </div>

            @else
                {{-- Placeholder --}}
                <div class="text-muted fst-italic"
                     style="background:#f5f5f5;padding:20px;border-radius:5px;">
                    Sambutan kepala sekolah belum diisi.
                </div>
            @endif

            <div class="mt-3">
                <a href="{{ route('admin.sambutan.edit') }}" class="btn btn-primary">
                    ✏️ Edit Sambutan
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
