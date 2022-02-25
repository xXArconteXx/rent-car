<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Rent extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ["date_start", "date_end", "date_give", "user_id", "vehicle_id", "status", "cost"];
    // All dates that pass the dates for in or out of the bdo cross for carbon, convert dateString to type carbon
    protected $dates = ["date_start", "date_end", "date_give"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penalty(){
        return $this->hasOne(Penalty::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
