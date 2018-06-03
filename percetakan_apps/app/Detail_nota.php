<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_nota extends Model
{
	use SoftDeletes;
	
    protected $table = "detail_nota";

    function produk(){
        return $this->belongsTo("App\Produk");
    }

    function bahan_baku(){
        return $this->belongsTo("App\Bahan_baku");
    }
}
