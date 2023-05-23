{{-- Sebelum nya sudah dibuat layout app dari template admin pada folder views/layouts/app.blade.php, maka tinggal mengextend kan nya saja dan menambahkan fungsi blade @section --}}
@extends('layouts.app')

@section('content')
    {{-- <== menggunakan section content yang sudah disediakan dari layouts/app.blade.php nya --}}
    {{-- Masukkan saja apa yang perlu dimasukkan ke dalam section ini. bisa component dan lain-lain --}}


    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection
