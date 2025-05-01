<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrayerTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'subuh',
        'syuruq',
        'dzhuhur',
        'asar',
        'maghrib',
        'isya'
    ];

    // protected $dates = ['date'];

    // public $timestamps = false;
}