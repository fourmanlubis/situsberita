@extends('layouts.app')


@section('navbar-kategori')
<div class="container bg-secondary">
        <ul class="nav">
                @foreach ($Kategori as $item)
                 <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route("kategori",["kategori_id" =>$item->id])}}">
                        {{ $item->nama_kategori }}</a>
                 </li>
                @endforeach
           
        </ul>
    
</div>
@endsection

@section ('content')
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link News" href="#">News</a>
  </li>
  <li class="nav-item">
    <a class="nav-link Tren" href="#">Tren</a>
  </li>
  <li class="nav-item">
    <a class="nav-link Health" href="#">Health</a>
  </li>
  <li class="nav-item">
    <a class="nav-link Food" href="#">Food</a>
  </li>
  <li class="nav-item">
    <a class="nav-link Edukasi" href="#">Edukasi</a>
  </li>
  
</ul>
    <div class="container">
        <h1>Berita Terkini</h1>
        <hr> 
         <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="https://picsum.photos/200" alt="...">
                  <p class="card-text"> 
                  <small class="text-danger"> </small>
                  </p>
                </div>
                
            @foreach ($Berita as $item)
           <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="https://picsum.photos/200" alt="...">
                </div>
                 <div class="col-md-8">
                    <div class="card-body">
                      <h2 class="card-title">
                          <a href="{{ route("detail.berita",["berita_id" => $item->id ]) }}"> {{$item->judul}}</a> </h2>
                        <p class="card-text"> 
                            <small class="text-danger"> {{$item->Kategori->nama_kategori}} </small> 
                            {{$item->created_at}}
                        </p>
                  </div>
                </div>
              </div>
            </div>
            
            @endforeach
            <div class="float-right">
                {{ $Berita->links() }} 
            </div>
    </div>
    
@endsection