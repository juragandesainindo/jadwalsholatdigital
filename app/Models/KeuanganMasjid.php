<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganMasjid extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_keuangan_id',
        'tanggal',
        'keterangan',
        'jenis',
        'nominal',
        'status',
    ];

    public function kategoriKeuangan()
    {
        return $this->belongsTo(KategoriKeuangan::class);
    }
}
