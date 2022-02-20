<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ["date_start", "date_end", "date_give", "user_id", "vehicle_id"];
    // All dates that pass the dates for in or out of the bdo cross for carbon, convert dateString to type carbon
    protected $date = ["date_start", "date_end", "date_give"];

}
