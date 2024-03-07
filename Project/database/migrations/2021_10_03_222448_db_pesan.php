<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbPesan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbPesan', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('pesan');
            $table->string('key');
            $table->string('user1');
            $table->string('user2');
            $table->string('tanggal');
            $table->string('waktu');
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
        Schema::dropIfExists('dbPesan');
    }
}
