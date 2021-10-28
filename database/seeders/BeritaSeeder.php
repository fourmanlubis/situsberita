<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    
    
    @return void
    
     
    public function run()
    {
        \App\Models\Berita::factory()->count(100)->create();
        
    }
}
