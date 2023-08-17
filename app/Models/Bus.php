<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'trip_id',
        'total_seats',
        'available_seats'
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
