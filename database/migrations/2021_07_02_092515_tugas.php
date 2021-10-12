<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class Tugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('nomor_surat');
            $table->string('file_surat');
            $table->foreignId('surat_masuk_id')
                ->nullable()
                ->constrained('surat_masuk')
                ->onDelete('cascade');
            $table->timestamps();
            // $table->unsignedBigInteger('id_masuk');
            // $table->foreign('id_masuk')->references('id_masuk')->on('inbox')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_tugas');
    }
}
