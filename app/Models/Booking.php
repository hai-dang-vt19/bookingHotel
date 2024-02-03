<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'idBooking',
        'idRoom',
        'phone',
        'adult',
        'children',
        'baby',
        'checkin',
        'checkout',
        'status'
    ];
    public $timestamps = false;
}
