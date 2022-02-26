<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {
        for($i=0; $i<11; $i++){
            $id = rand(1, 4);
            $seats = rand(2, 9);
            
            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'image' =>'carImages/alfaromeo-giulia.png',
                'category_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'image' =>'carImages/bmw-i3.png',
                'category_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'image' =>'carImages/fiat-tipo.png',
                'category_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'image' =>'carImages/jeep-renegade.png',
                'category_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'image' =>'carImages/mercedes-vito.png',
                'category_id' =>$id,
            ]);
        }
    }
  
}
