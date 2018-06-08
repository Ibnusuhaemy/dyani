<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan_baku;
use Illuminate\Support\Facades\Auth;

class BahanBakuController extends Controller
{
    function index(){
    	$bahan_baku = Bahan_baku::orderBy("created_at", 'desc')->get();

    	return view("bahan_baku.index", compact('bahan_baku'));
    }

    function baru(){
    	return view("bahan_baku.tambah");
    }
}
