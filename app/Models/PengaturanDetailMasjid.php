<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanDetailMasjid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'alamat2',
        'logo',
    ];
}
