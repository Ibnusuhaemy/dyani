<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Pelanggan;
use App\Detail_nota;
use App\Bahan_baku;
use App\Produk;

class PemesananController extends Controller
{
    public function index(){
    	return view("pemesanan.index");
    }

    public function add(){
    	return view("pemesanan.tambah");
    }

    public function buatNota(Request $request){
    	// dd($request->user()->id);
    	$pelanggan = new Pelanggan;
    	$pelanggan->nama = $request->nama;
    	$pelanggan->telp = $request->telp;
    	$pelanggan->email = $request->email;
    	$pelanggan->alamat = $request->alamat;
    	$pelanggan->user_id = $request->user()->id;
    	$pelanggan->save();

    	$nota = new Nota;
    	$nota->kode = $this->buatKodeNote($request->user()->id);
    	$nota->tgl_pesan = $request->tgl_pesan;
    	$nota->tgl_ambil = $request->tgl_ambil;
    	$nota->created_by = $request->user()->id;
    	$nota->pelanggan_id = $pelanggan->id;
    	$nota->save();

    	return redirect("/pemesanan/".$nota->id);
    }

    public function buatKodeNote($created_by){
    	return "Nota#".$created_by."_".substr(md5(uniqid(rand())), 3, 5).date("his_ymd");
    }

    function detail($nota_id){
		$nota = Nota::find($nota_id);
		// dd($nota->pelanggan->nama);
    	return view("pemesanan.detail", compact('nota'));
    }
}
