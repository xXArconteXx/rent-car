<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['number_plate', 'model', 'description', 'seats', 'image', 'price', 'category_id'];

    // eloquence relationship
    public function rent()
    {
        return $this->hasOne(Rent::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
