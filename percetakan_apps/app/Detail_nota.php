<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_nota extends Model
{
    protected $table = "detail_nota";

    function produk(){
        return $this->hasOne("App\Produk");
    }

    function bahan_baku(){
        return $this->hasOne("App\Bahan_baku");
    }
}
