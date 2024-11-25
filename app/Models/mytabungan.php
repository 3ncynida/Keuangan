<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mytabungan extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel
    protected $table = 'tabungan';
    
    // Jika 'user_id' adalah primary key dan bukan 'id'
    protected $primaryKey = 'id';
    
    // Jika primary key bukan auto-increment
    public $incrementing = false;

    // Jika primary key adalah string
    protected $keyType = 'string'; // Ubah jika tipe primary key berbeda

    protected $fillable = [
        'jumlah_tabungan',
        'tanggal',
    ];

    public function pengurangan()
{
    return $this->hasMany(PenguranganTabungan::class);
}
}
