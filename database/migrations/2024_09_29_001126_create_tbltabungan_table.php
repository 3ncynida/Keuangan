<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tabungan', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->decimal('jumlah_tabungan'); // Mengubah ke integer untuk jumlah tabungan
            $table->date('tanggal'); // Tanggal tabungan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraint jika diperlukan
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabungan'); // Menghapus tabel jika rollback
    }
};
