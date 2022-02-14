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
                'image' => '{{URL:asstes("image/monovolumen.webp")}}',
            ]);
            DB::table('categories')->insert([
                'name' => 'Furgoneta',
                'image' => '{{URL:asstes("image/furgoneta.webp")}}',
            ]);
            DB::table('categories')->insert([
                'name' => 'Eléctricos',
                'image' => '{{URL:asstes("image/electrico.webp")}}',
            ]);
            DB::table('categories')->insert([
                'name' => 'Camión',
                'image' => '{{URL:asstes("image/camion.webp")}}',
            ]);
        
    }
}
