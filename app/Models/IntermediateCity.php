<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntermediateCity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'city_id',
        'trip_id',
        'sequence_number',
    ];

    public function trips()
    {
        return $this->belongsTo(Trip::class);
    }
}
