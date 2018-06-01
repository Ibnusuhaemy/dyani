<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailNota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("nota_id");
            $table->integer("produk_id");
            $table->string("ukuran",30)->nullable();
            $table->integer("jumlah")->nullable();
            $table->integer("bahan_baku_id")->nullable();
            $table->string("status", 10)->nullable();
            $table->string("file_desain", 75)->nullable();
            $table->integer("desainer_id")->nullable();
            $table->integer("produksi_id")->nullable();
            $table->integer("harga")->nullable();
            $table->string("catatan_desain", 100)->nullable();
            $table->string("catatan_finishing", 100)->nullable();
            $table->string("catatan", 100)->nullable();
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
