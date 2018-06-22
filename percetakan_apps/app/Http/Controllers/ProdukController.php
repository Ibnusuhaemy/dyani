<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    function index(){
    	$produk = Produk::orderBy("created_at", 'desc')->get();

    	return view("produk.index", compact('produk'));
    }

    function baru(){
    	return view("produk.tambah");
    }

    function simpan(Request $request){
    	$produk = new Produk;
    	$produk->nama = $request->nama;
    	$produk->harga_satuan = $request->harga_satuan;
    	$produk->satuan = $request->satuan;
    	$produk->deskripsi = $request->deskripsi;
    	$produk->created_by = Auth::user()->id;

    	$produk->save();

    	return redirect("/produk");
    }

    function update(Request $request){
    	$produk = Produk::find($request->id);
    	$produk->nama = $request->nama;
    	$produk->harga_satuan = $request->harga_satuan;
    	$produk->satuan = $request->satuan;
    	$produk->deskripsi = $request->deskripsi;

    	$produk->save();

    	return redirect()->back();
    }

    function hapus($id){
    	return response()->json($id);
    }
}
