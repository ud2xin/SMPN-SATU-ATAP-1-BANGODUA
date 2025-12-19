@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <h4 class="mb-4">SPMB</h4>

    @if($spmb)
        <div class="card">
            <div class="card-body row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$spmb->gambar) }}"
                         class="img-fluid rounded"
                         alt="SPMB">
                </div>

                <div class="col-md-8">
                    {{-- PERBAIKAN: Tampilkan HTML dengan {!! !!} dan strip tags untuk preview --}}
                    <div class="border p-3 mb-3" style="max-height:150px;overflow-y:auto;">
                        {!! Str::limit(strip_tags($spmb->konten), 200) !!}
                    </div>

                    @if($spmb->link)
                        <a href="{{ $spmb->link }}" target="_blank" class="d-block mb-3 text-primary">
                            <i class="fas fa-external-link-alt"></i> {{ Str::limit($spmb->link, 50) }}
                        </a>
                    @else
                        <p class="text-muted mb-3">
                            <i class="fas fa-link"></i> Link belum diisi
                        </p>
                    @endif

                    <a href="{{ route('admin.spmb.edit', $spmb->id) }}"
                       class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- TAMPILAN ABU-ABU JIKA BELUM ADA DATA --}}
        <div class="card border-0 bg-light text-center">
            <div class="card-body py-5">
                <div class="mb-3">
                    <div class="bg-secondary rounded mx-auto"
                         style="width:200px;height:150px;opacity:0.3;">
                    </div>
                </div>

                <p class="text-muted">
                    Data SPMB belum diisi
                </p>

                <a href="{{ route('admin.spmb.create') }}"
                   class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
    @endif
</div>

<style>
    /* Style untuk konten HTML dari Summernote */
    .border p {
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    
    .border p:last-child {
        margin-bottom: 0;
    }
</style>
@endsection