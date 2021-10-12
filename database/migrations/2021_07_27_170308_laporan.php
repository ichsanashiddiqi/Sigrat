<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->foreignId('petugas_id')
                ->primary()
                ->constrained('petugas')
                ->onDelete('cascade');
            $table->string('jenis_gratifikasi');
            $table->string('bentuk_gratifikasi');
            $table->string('golongan');
            $table->integer('nilai_equivalent');
            $table->timestamp('tanggal_pemberian');
            $table->string('tempat');
            $table->string('hubungan_pemberi');
            $table->string('waktu_pelaksanaan')->nullable();
            $table->string('foto')->nullable();
            // $table->foreignId('surat_tugas_id')
            //     ->nullable()
            //     ->constrained('surat_tugas')
            //     ->onDelete('cascade');
            $table->foreignId('pemberi_gratifikasi_id')
                ->constrained('pemberi_gratifikasi')
                ->onDelete('cascade');
            // $table->foreignId('user_id')
            //     ->constrained('users')
            //     ->onDelete('cascade');
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
        Schema::dropIfExists('laporan');
    }
}
