<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_pesanan');
            $table->string('total_harga_pesanan');
            $table->string('atas_nama');
            $table->foreignId('meja_id')->constrained('meja')->onDelete('cascade');
            $table->foreignId('status_pesanan_id')->constrained('status_pesanan')->onDelete('cascade');
            $table->foreignId('status_pembayaran_id')->constrained('status_pembayaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};
