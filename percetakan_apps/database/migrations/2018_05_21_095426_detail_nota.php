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
            $table->string("ukuran",30);
            $table->integer("jumlah");
            $table->integer("bahan_baku_id");
            $table->string("status", 10)->nullable();
            $table->string("file_desain", 50);
            $table->integer("desainer_id")->nullable();
            $table->integer("produksi_id")->nullable();
            $table->integer("harga");
            $table->string("catatan", 100);
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
