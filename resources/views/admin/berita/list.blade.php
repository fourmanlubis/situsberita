@extends('layout.app')

@section('content')
    <div class="container">
        @if (session("info"))
            <div class="alert alert-success">
                {{ session("info") }}
            </div>
        @endif
        <h1>List Berita </h1>
        <hr>
        <div class="d-flex-row-reverse mb-3">
        <a href="{{ route("admin.berita,form") }}" class="btn btn-success">Tambah</a>
        </div>
        <table class="tab table-bordered">
            <thead>
                <tr>
                    <td width="10%">No.</td>
                    <td>judul</td>
                    <td colspain=3 width="10%"> action</td>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($berita as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route("detail.beranda",["berita_id" => $item->id]) }}">{{ $item->judul }}</td>
                        <td><a href="{{ route("admin.berita.edit",$item) }} "class="btn-warning btn-block">Rubah</a></td>
                        <td><a href="{{ route("admin.berita.destory",$item) }} " class="btn-danger btn-block">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection