<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->increments('id');
            $table->string("kode", 35);
            $table->datetime("tgl_pesan");
            $table->datetime("tgl_ambil");
            $table->enum("waktu_ambil", ["siang", "sore", "malam"]);
            $table->enum("transaksi", ["cash", "DP", "transfer bank"]);
            $table->integer("bayar")->nullable();
            $table->integer("created_by");
            $table->integer("pelanggan_id");
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
