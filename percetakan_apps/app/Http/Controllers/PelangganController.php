<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    function index(){
    	$pelanggan = Pelanggan::orderBy("created_at", 'desc')->get();

    	return view("pelanggan.index", compact('pelanggan'));
    }

    function hapus($id){
    	// $pelanggan = Pelanggan::find($id);
    	// $pelanggan->delete();

    	return redirect()->back();
    }

    function baru(){

    	return view("pelanggan.tambah");
    }

    function simpan(Request $request){
    	$pelanggan = new Pelanggan;
    	$pelanggan->nama = $request->nama;
    	$pelanggan->alamat = $request->alamat;
    	$pelanggan->telp = $request->telp;
    	$pelanggan->email = $request->email;
    	$pelanggan->user_id = Auth::user()->id;

    	$pelanggan->save();

    	return redirect("pelanggan");
    }

    function update(Request $request){
    	$pelanggan = Pelanggan::find($request->id);
    	$pelanggan->nama = $request->nama;
    	$pelanggan->alamat = $request->alamat;
    	$pelanggan->telp = $request->telp;
    	$pelanggan->email = $request->email;
    	$pelanggan->save();

    	return redirect()->back();
    }
}
