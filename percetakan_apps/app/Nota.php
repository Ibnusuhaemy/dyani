<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = "nota";

    function pelanggan(){
        return $this->belongsTo("App\Pelanggan");
    }

    function detail_nota(){
        return $this->hasMany("App\Detail_nota");
    }

    function user(){
        return $this->belongsTo("App\User");
    }
}
