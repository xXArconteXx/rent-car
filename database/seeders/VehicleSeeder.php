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
            // DB::table('vehicles')->insert([
            //     'number_plate' => $faker->name,
            //     'model' => $faker->name,
            //     'description' => $faker->paragraph(),
            //     'seats' => $seats,
            //     'price' => $seats,
            //     'availability' => $faker->boolean(),
            //     'image' =>$faker->image('public/carImages',640,480, null, false),
            //     'categories_id' =>$id,
            // ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'availability' => $faker->boolean(),
                'image' =>'carImages/alfaromeo-giulia.png',
                'categories_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'availability' => $faker->boolean(),
                'image' =>'carImages/bmw-i3.png',
                'categories_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'availability' => $faker->boolean(),
                'image' =>'carImages/fiat-tipo.png',
                'categories_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'availability' => $faker->boolean(),
                'image' =>'carImages/jeep-renegade.png',
                'categories_id' =>$id,
            ]);

            DB::table('vehicles')->insert([
                'number_plate' => $faker->name,
                'model' => $faker->name,
                'description' => $faker->paragraph(),
                'seats' => $seats,
                'price' => $seats,
                'availability' => $faker->boolean(),
                'image' =>'carImages/mercedes-vito.png',
                'categories_id' =>$id,
            ]);
        }
    }
  
}
