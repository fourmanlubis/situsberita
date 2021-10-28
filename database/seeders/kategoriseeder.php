<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \schema::disableForeignKeyConstraints();
        \DB::table("tblkategori")->truncate();
        \App\Models\kategori::insert([
             ["nama_kategori" => "umum"],
             ["nama_kategori" => "tren"],
             ["nama_kategori" => "health"],
             ["nama_kategori" => "food"],
             ["nama_kategori" => "edukasi"],
            
            
        ]);
         \schema::disableForeignKeyConstraints();
    }
}
