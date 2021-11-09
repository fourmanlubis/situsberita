<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class beritacontroller extends Controller
{
    public function index()
    {
        return view("admin.berita.list",[ 
                "berita" => \App\Models\Berita::latest()->get()
            ]);
    
    }
    
    public function show(){
        return view("admin.berita.form",[
            "kategori" => \App\Models\kategori::all()
            ]);
    }
    
    public function store(Request $request){
        $request->validate{[
            "kategori" => "required",
             "judul" => "required|min:50|max:255",
              "isi" => "required|min:100"
            ]);
            
        Berita::create([
         "kategori_id" =>$request->kategori,
         "judul" =>$request->judul
         "gambar" =>$request->file("gambar")->store("berita"),
         "isi" => $request-> isi
        ]);
        
        return redirect()->route("admin.berita.index");
        ->with("info","berhasil input berita");
    }


    public function edit(berita $berita){
        return view("admin.berita.form",[
            "kategori" => \App\Models\kategori::all(),
            "berita" => $berita
            
            ]);
    }
    public function update(Berita $berita){
        $berita->save();
        return redirect()->route("admin.berita.index")
        ->with("info","berhasil update berita");
    }
    
    public function destory(Berita $berita){
        $berita->delete();
        
        return redirect()->route("admin.berita.index")
        ->with("info","berhasil hapus berita");
        
    }
    
    public function simpankomentar(Request $request){
      
        \App\Models\komentar::create([
            "isi_komentar" => $request->komentar,
            "berita_id" => $request->berita_id,
            "user_id" => $request->user->id
            ]);
            
            return redirect()->route('detail.berita',["berita_id" => $request->berita_id]);
    }
}
