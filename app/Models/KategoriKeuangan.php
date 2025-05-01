<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKeuangan extends Model
{
    use HasFactory;

    protected $fillable = ['kategori'];

    public function keuanganMasjid()
    {
        return $this->hasMany(KeuanganMasjid::class);
    }

    public function keuanganBulanLalu()
    {
        return $this->hasMany(KeuanganMasjid::class);
    }

    public function keuanganTujuhHari()
    {
        return $this->hasMany(KeuanganMasjid::class);
    }
}