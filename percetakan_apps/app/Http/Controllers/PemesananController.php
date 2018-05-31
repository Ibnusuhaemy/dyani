<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Pelanggan;
use App\Detail_nota;
use App\Bahan_baku;
use App\Produk;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index(){
        $nota = Nota::where("created_by", Auth::id())->get();
    	return view("pemesanan.index", compact('nota'));
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
        $nota->transaksi = $request->transaksi;
        $nota->bayar = $request->bayar;
    	$nota->created_by = $request->user()->id;
    	$nota->pelanggan_id = $pelanggan->id;
    	$nota->save();

    	return redirect("/pemesanan/".$nota->id);
    }

    public function buatKodeNote($created_by){
    	return "Nota#".$created_by."_".substr(md5(uniqid(rand())), 3, 5).date("his_ymd");
    }

    function editNota(Request $request){
        $nota = Nota::findOrFail($request->id);
        $nota->waktu_ambil = $request->waktu_ambil;
        $nota->bayar = $request->bayar;
        $nota->save();
        return redirect()->back();
    }

    function detail($nota_id){
		$nota = Nota::find($nota_id);
		$produk = Produk::all();
        $bahan_baku = Bahan_baku::orderBy("nama")->get();
        $detail_nota = Detail_nota::with('produk', 'bahan_baku')->where("nota_id", $nota_id)->get();
        $cek_detail_nota = array();

        foreach ($detail_nota as $details) {
            $cek_detail_nota[] = $details->produk_id;
        }
        // dd($cek_detail_nota);
        $produk = $produk->each(function($item, $key) use($cek_detail_nota){
            // produk yg tidak ada di detail_nota:$item->id
            if (in_array($item->id, $cek_detail_nota, true)) {
                $item->selected = true;
            }
            
        });

        // dd($produk);
    	return view("pemesanan.detail", compact('nota', 'produk', 'bahan_baku', 'detail_nota'));
    }

    function tambahItem(Request $request){
        $detail_nota = new Detail_nota;
        $detail_nota->nota_id = $request->nota_id;
        $detail_nota->produk_id = $request->produk_id;
        $detail_nota->save();

        return redirect("/pemesanan/".$request->nota_id);
    }

    function updateItem(Request $request){

        for ($i=0; $i < sizeof($request->id) ; $i++) { 
            Detail_nota::where("id", $request->id[$i])->update([
                "bahan_baku_id" => $request->bahan_baku[$i],
                "ukuran" => $request->ukuran[$i],
                "jumlah" => $request->jumlah[$i],
                "harga" => $request->total_harga[$i],
            ]);
        }
        return redirect()->back();
    }
}
