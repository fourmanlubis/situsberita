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
        \App\Models\Berita::create([
         "kategori_id" =>$request->kategori_id,
         "judul" =>$request->judul
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
}
