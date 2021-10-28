<?php

namespace Database\Factories;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class kategorifactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */@var string
     
     protected$model = berita::class;
     
     @return array
     
    public function definition()
    {
        return [
            "judul" => $this->faker->sentece(5);
            "isi" => $this->faker->text(500),
            "kategori_id" => \App\Models\kategori::get("id")->random();
            "user_id" => \App\Models\user::get("id")->first()
            
        ];
    }
}
