<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenguranganTabungan extends Model
{
    use HasFactory;

    protected $table = 'pengurangan_tabungan';

    protected $fillable = ['tabungan_id', 'jumlah_pengurangan', 'tanggal'];

    public function tabungan()
    {
        return $this->belongsTo(mytabungan::class);
    }
}
