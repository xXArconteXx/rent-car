<?php

namespace Database\Seeders;
// use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
                'name' => 'Monovolumen',
                'image' => "image/monovolumen.webp",
            ]);
            DB::table('categories')->insert([
                'name' => 'Furgoneta',
                'image' => "image/furgoneta.webp",
            ]);
            DB::table('categories')->insert([
                'name' => 'Eléctricos',
                'image' => "image/electrico.webp",
            ]);
            DB::table('categories')->insert([
                'name' => 'Camión',
                'image' => "image/camion.webp",
            ]);
        
    }
}
