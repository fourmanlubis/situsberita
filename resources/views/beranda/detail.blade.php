@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $Berita->judul }} </h1>
    <p><span class="text-danger">{{ $Berita->kategori->nama_kategori }}</span> - {{ $Berita->created_at }}</p>
    
    
    <img src="https://picsum.photos/800/400" atl="">
    <p class="mt-4 ">
        {{ $Berita->isi }}
        
    </p>
</div>

@endsection