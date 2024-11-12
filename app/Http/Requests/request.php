<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mytabungan extends Model
{
    use HasFactory;

    protected $table = 'tabungan';
    protected $primaryKey = 'user_id';
    public $incrementing = false; // Jika user_id bukan auto-increment
    protected $keyType = 'string'; // Jika tipe primary key berbeda

    protected $fillable = [
        'jumlah_tabungan',
        'tanggal',
    ];
}
