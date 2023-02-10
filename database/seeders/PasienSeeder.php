<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Doctor;
use Carbon\Carbon;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $id_doctor = Doctor::pluck('id')->random();
        $created_at = Carbon::parse()->now();
        for ($i = 0; $i < 3; $i++) {
            DB::table('patients')->insert([
                'nama' => $faker->name,
                'umur' => $faker->numberBetween($min = 1, $max = 150),
                'jenis_kelamin' => $faker->randomElement(['L','P']),
                'alamat' => $faker->address,
                'no_telpon' => $faker->phoneNumber,
                'dokter_id' => $id_doctor,
                'created_at' => $faker->date('Y_m_d'),
                'updated_at' => $faker->date('Y_m_d'),
                
                // dst.
            ]);
        }
    }
} 