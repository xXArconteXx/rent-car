<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call(CategorySeeder::class);
        $this -> call(VehicleSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
