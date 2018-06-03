<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Nota extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $table = "nota";
    protected  $cascadeDeletes = ["detail_nota"];

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
