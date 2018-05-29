<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_nota extends Model
{
    protected $table = "detail_nota";

    function produk(){
        return $this->belongsTo("App\Produk");
    }

    function bahan_baku(){
        return $this->belongsTo("App\Bahan_baku");
    }
}
