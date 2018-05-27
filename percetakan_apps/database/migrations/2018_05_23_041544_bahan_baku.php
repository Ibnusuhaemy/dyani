<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BahanBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nama", 50);
            $table->integer("qty");
            $table->integer("harga_beli_satuan");
            $table->integer("harga_jual_satuan");
            $table->string("satuan", 10);
            $table->softDeletes();
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
        //
    }
}
