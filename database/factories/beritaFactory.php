<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class beritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "judul" => $this->faker->sentence(5),
            "isi" => $this->faker->text(500),
            "kategori_id" => \App\Models\Kategori::get("id")->random()
        ];
    }
}

