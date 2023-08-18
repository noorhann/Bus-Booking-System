<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'trip_date',
        'start_city',
        'end_city',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function intermediateCities()
    {
        return $this->hasMany(IntermediateCity::class);
    }
}
