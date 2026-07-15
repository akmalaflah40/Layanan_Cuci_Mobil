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
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            // Data pelanggan
            $table->string('nama_lengkap');
            $table->string('no_hp',20);
            $table->text('alamat');
            $table->string('kendaraan');

            // Relasi ke tabel services
            $table->foreignId('service_id')
                  ->constrained('services')
                  ->cascadeOnDelete();

            // Harga layanan saat booking
            $table->decimal('total_harga',10,2);

            // Jadwal booking
            $table->date('tanggal_booking');
            $table->string('jam_booking',5);

            // Catatan
            $table->text('catatan')->nullable();

            // Status booking
            $table->enum('status',[
                'Menunggu',
                'Diproses',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};