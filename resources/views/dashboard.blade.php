@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard Admin
        </h1>
        <span class="d-none d-sm-inline-block badge badge-primary badge-lg">
            <i class="far fa-clock mr-1"></i>{{ now()->format('d M Y, H:i') }}
        </span>
    </div>

    <!-- Welcome Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                Selamat datang, {{ auth()->user()->name }}! 👋
                            </div>
                            <div class="text-xs mt-2 text-gray-600">
                                Anda login sebagai <span class="badge badge-info">Administrator</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
