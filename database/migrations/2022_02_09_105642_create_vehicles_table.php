<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('number_plate', 50);
            $table->string('model', 50);
            $table->longText('description', 450);
            $table->integer('seats');
            $table->string('image', 80)->default('image.webp');
            $table->boolean('available')->default(1);
            $table->float('price', 6);
            $table->unsignedBigInteger('categories_id')->nullable();
            
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
                
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
