<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = ['cost', 'additional_comments', 'rent_id'];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
