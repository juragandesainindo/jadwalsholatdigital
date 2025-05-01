<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetugasJumat extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'tanggal',
        'imam',
        'khotib',
        'muazin',
        'judul',
    ];
}
