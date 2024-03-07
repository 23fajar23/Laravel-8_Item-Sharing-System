<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbMinta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbMinta', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('idBarang');
            $table->string('namaBarang');
            $table->string('pemilik');
            $table->string('namaPemilik');
            $table->string('pencari');
            $table->string('daerah');
            $table->string('jumlah');
            $table->string('waktu');
            $table->string('kirim');
            $table->string('resi')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('dbMinta');
    }
}
