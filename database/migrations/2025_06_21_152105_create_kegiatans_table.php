<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('kegiatans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->date('tgl_pelaksanaan');
        $table->foreignId('organisasi_id')
              ->constrained('organisasis')
              ->onDelete('cascade'); // Hapus kegiatan jika organisasi dihapus
        $table->foreignId('lokasi_id')
              ->constrained('lokasis')
              ->onDelete('cascade'); // Hapus kegiatan jika lokasi dihapus
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
