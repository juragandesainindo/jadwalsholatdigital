<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['image', 'type', 'status', 'order'];

    // Accessor untuk memudahkan deteksi type
    public function getTypeAttribute($value)
    {
        if ($value) {
            return $value;
        }

        $extension = pathinfo($this->image, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['mp4', 'webm', 'ogg']) ? 'video' : 'image';
    }
}