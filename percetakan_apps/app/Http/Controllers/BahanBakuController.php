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

    function simpan(Request $request){
    	$bahan_baku = new Bahan_baku;
    	$bahan_baku->nama = $request->nama;
    	$bahan_baku->qty = $request->qty;
    	$bahan_baku->harga_beli_satuan = $request->harga_beli;
    	$bahan_baku->harga_jual_satuan = $request->harga_jual;
    	$bahan_baku->satuan = $request->satuan;

    	$bahan_baku->save();

    	return redirect("/bahan-baku");
    }

    function update(Request $request){
    	$bahan_baku = Bahan_baku::find($request->id);
    	$bahan_baku->nama = $request->nama;
    	$bahan_baku->qty = $request->qty;
    	$bahan_baku->satuan = $request->satuan;
    	$bahan_baku->harga_beli_satuan = $request->harga_beli;
    	$bahan_baku->harga_jual_satuan = $request->harga_jual;

    	$bahan_baku->save();

    	return redirect()->back();
    }

    function hapus($id){
    	return response()->json($id);
    }
}
