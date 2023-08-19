<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'seat_id',
        'seat_count',
        'start_city',
        'end_city',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
