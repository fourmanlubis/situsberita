<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritacontroller;

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
    "Berita" =>\App\Models\Berita::where("kategori_id",$kategori_id)
                    ->latest()
                    ->paginate(10)
    ]);
    
})->name("Kategori");

Route::get('/detail/{berita_id}',function($berita_id){
        return view('beranda.detail',[
            "Berita" => \App\Models\Berita::find($berita_id)
        ]);
    
})->name("detail.beranda");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// berita
route::middleware(['auth'])->group(function (){
    route::get("/admin/berita/",[beritacontroller::class,'index'])->name("admin.berita.index");
    route::get("/admin/berita/form",[beritacontroller::class,'index'])->name("admin.berita.form");
    route::post("/admin.berita",[beritacontroller::class,'store'])->name("admin.berita.store");
    
    route::get("admin/berita/rubah/{berita}",[beritacontroller::class,"edit"])->name("admin.berita.edit");
    route::get("admin/berita/update",[beritacontroller@store::class,"update"])->name("admin.berita.update");    
    
    route::get("admin/berita/destory/{berita}",[beritacontroller::class,'destory'])
    ->name("admin.berita.destoty");
    
    
});

