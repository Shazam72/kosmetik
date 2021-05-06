<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ["name" => "Soins esthétiques"],
            ["name" => "Manicure & Pédicure"],
            ["name" => "Hygiène & Toilette"],
            ["name" => "Solaires"],
            ["name" => "Capillaires"],
            ["name" => "Epilation"],
            ["name" => "Parfums & Déodorants"],
        ]);
    }
}
