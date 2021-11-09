@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $Berita->judul }} </h1>
    <p><span class="text-danger">{{ $Berita->kategori->nama_kategori }}</span> - {{ $Berita->created_at }}</p>
    
    
    <img src="https://picsum.photos/id/{{ $berita-> }}/800/400" alt="" class="w-100">
    <p class="mt-4 ">
        {{ $Berita->isi }}
        
    </p>
    <h2>{{ $berita->komentar->count() }} komentar </h2>
    <hr
    @auth
        <form action="{{ route("simpan.komentar") }}" method="POST" autocomplete="off">
        @csrf
        <input type="hidden" name="berita_id"value="{{ $berita->id }}">
            <div class="form-group">
                <input type="text" name="komentar" class="form-control" placeholder="ketikkan komentaranda">
            </div>
            <div class="form-group d-flex-row-reverse">
                <input type="submit" value="kirim komentar" class="btn-btn-success">
                
            </div>
    </form>
    @endauth
    <ul class="list-unstyled">
        @foreach ($berita->komentar as $item)
    
       
  <li class="media">
        <img src="..." class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="mt-0 mb-1">{{ $item->user->name }}</h5>
          <spanp class="text-muted">{{ $item->created_at }} </span>
          <p>{{ $item->isi_komentar }}</p>
   
        </div>
      </li>
       @endforeach 
    </ul>
</div>

@endsection