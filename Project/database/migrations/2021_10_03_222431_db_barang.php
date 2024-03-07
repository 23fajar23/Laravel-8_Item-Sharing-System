<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbBarang', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('namaBarang');
            $table->string('pemilik');
            $table->string('foto');
            $table->string('jumlah');
            $table->string('deskripsiLengkap');
            $table->string('daerah');
            $table->string('kategori');
            $table->string('alamat');
            $table->string('stock');
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('dbBarang');
    }
}
