<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posko_id');
            $table->foreign('posko_id')->references('id')->on('posko')->onDelete('cascade');
            $table->timestamp('tanggal_kegiatan');
            $table->string('petugas');
            $table->string('deskripsi');
            $table->enum('status', ['belum mulai', 'berlangsung', 'selesai']);
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
        Schema::dropIfExists('events');
    }
}
