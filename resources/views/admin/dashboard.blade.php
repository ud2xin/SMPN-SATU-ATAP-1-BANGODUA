@extends('layouts.sbadmin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>
<p>Selamat datang, {{ auth()->user()->name }}!</p>
@endsection
