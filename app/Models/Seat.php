<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'seat_number',
        'is_booked',
        'bus_id',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
