<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("beranda.home",[
            "Kategori" => \App\Models\Kategori::all(),
            "Berita" =>\App\Models\Berita::latest()->paginate(10)
        ]);
});

Route::get('/kategori/{kategori_id}',function($kategori_id){
    return view('beranda.home',[
    "kategori" =>\App\Models\Kategori::all(),
    "berita" =>\App\Models\Berita::where("kategori_id",$kategori_id)
                    ->latest()
                    ->paginate(10)
    ]);
    
})->name("Kategori");

Route::get('/detail/{berita_id}',function($berita_id){
        return view('beranda.detail',[
            "beranda" => \App\Models\Berita::find($berita_id)
        ]);
    
})->name("detail.beranda");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
