<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => \App\Models\user::get("id")->first(),
            "isi_komentar" => $this->faker->senetnce(10),
            "berita_id" => \App\Mosels\berita::get("id")->random()
            //
        ];
    }
}
