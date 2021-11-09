@extends('layout.app')

@section('content')
    <div class="container">
        <h1>input berita</h1>
        <hr>
        <form action="{{ isset($berita) route("admin.berita.update",$berita):route("admin.berita.store") }}" 
        autocomplete="off" method="post"
        enctype="mulipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">kategori</label>
                <select name="kategori" id="" class="form-control @error('kategori') is-invalid @enderror">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}"
                        @isset($berita)
                            @if ($berita->kategori_id== $item->id)
                            {{ selected }}
                            @endif
                        @endisset>{{ $item->nama_kategori }}</option>
                @endforeach
                </select>
                @error('kategori')
                      <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">judul</label>
                <input type="text" name="judul"
                
                class="form-control @error('judul') is-invalid @enderror">
                value="{{ isset($berita)?$berita->judul:old("judul") }}" />
                    @isset($berita)
                        value='{{ $berita->judul }}'
                    @endisset>
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                
            </div>
            <div class="form-group">
                <label for=""> Gambar</label>
                <input type="file" name="" id="" class="form-control">
            </div> 
            <div class="form-group">
                <label for="">isi</label>
                <textarea name="isi"id="" cols="30" rows="10" 
                class="form-control @error('isi') is-invalid @enderror">{{ isset($berita)?$berita->isi:old("isi") }}
                </textarea>
                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <input type="submit" class="btn btn-success" value="simpan">
                
            </div>
        </form>
    </div>
@endsection