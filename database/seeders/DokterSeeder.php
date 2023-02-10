<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 100000, $max = 250000);
        $roundedPrice = round($price / 50000, 0) * 50000;

        for ($i = 0; $i < 3; $i++) {
            DB::table('doctors')->insert([
                'nama' => $faker->name,
                'spesialisasi' => $faker->randomElement(['Umum','Mata','Gigi']),
                'tarif' => $roundedPrice,
                'created_at' => $faker->date('Y_m_d'),
                'updated_at' => $faker->date('Y_m_d'),
                // dst.
            ]);
        }
    }
}
