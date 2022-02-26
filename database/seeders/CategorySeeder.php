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
            ]);
            DB::table('categories')->insert([
                'name' => 'Furgoneta',
            ]);
            DB::table('categories')->insert([
                'name' => 'Eléctricos',
            ]);
            DB::table('categories')->insert([
                'name' => 'Camión',
            ]);
        
    }
}
