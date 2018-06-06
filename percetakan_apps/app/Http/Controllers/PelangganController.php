<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    function index(){
    	$pelanggan = Pelanggan::all();

    	return view("pelanggan.index", compact('pelanggan'));
    }

    function hapus($id){
    	$pelanggan = Pelanggan::find($id);
    	$pelanggan->delete();

    	return redirect()->back();
    }
}
