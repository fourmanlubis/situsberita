@extends('layout.app')

@section('content')
    <div class="container">
        <h1>input berita</h1>
        <hr>
        <form action="{{ route("admin.berita.store") }}" autocomplete="off" method="post">
            @csrf
            <div class="form-group">
                <label for="">kategori</label>
                <select name="kategori" id="" class="form-control">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}"
                        @isset($berita)
                            @if ($berita->kategori_id== $item->id)
                            {{ selected }}
                            @endif
                        @endisset>{{ $item->nama_kategori }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">judul</label>
                <input type="text" name="judul" class="form-control">
                    @isset($berita)
                        value='{{ $berita->judul}}'
                    @endisset>
                    
                
            </div>
            <div class="form-group">
                <label for="">isi</label>
                <textarea name="isi"id="" cols="30" rows="10" class="form-control">@isset($berita){{ $berita->isi }}@endisset</textarea>
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <input type="submit" class="btn btn-success" value="simpan">
                
            </div>
        </form>
    </div>
@endsection