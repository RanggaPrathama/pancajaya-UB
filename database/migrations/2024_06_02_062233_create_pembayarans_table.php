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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_payment');
            $table->unsignedBigInteger('id_ongkir');
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_ongkir')->references('id_ongkir')->on('ongkirs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('buktiBayar');
            $table->tinyInteger('status')->default(0);
            $table->integer('totalPembayaran');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
