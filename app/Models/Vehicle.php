<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['number_plate', 'model', 'description', 'seats', 'availability', 'image', 'price', 'categories_id'];

    public function rent()
    {
        return $this->hasOne(Rent::class);
    }
}
