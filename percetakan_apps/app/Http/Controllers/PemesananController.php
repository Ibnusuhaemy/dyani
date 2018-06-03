<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Pelanggan;
use App\Detail_nota;
use App\Bahan_baku;
use App\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    function invoice($nota_id, $is_cetak = null){
        $nota = Nota::with(["detail_nota.bahan_baku", "detail_nota.produk",  "pelanggan"])->findOrFail($nota_id);
        // $detail_nota = Detail_nota::with('produk', 'bahan_baku')->where("nota_id", $nota_id)->get();
        $total_harga = $nota->detail_nota->sum("harga");
        // dd($total_harga);
        if(!is_null($is_cetak) && $is_cetak=='cetak'){
            return view("pemesanan.cetak", compact('nota', 'total_harga'));
        }elseif(!is_null($is_cetak) && $is_cetak != 'cetak'){
            abort(404);
        }
        return view("pemesanan.invoice", compact('nota', 'total_harga'));
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

    function updateDesain(Request $request){
        $detail_nota = Detail_nota::findOrFail($request->detail_nota_id);
        $detail_nota->catatan_desain = $request->catatan_desain;
        $detail_nota->save();

        return redirect()->back();
    }

    function updateFinishing(Request $request){
        $detail_nota = Detail_nota::findOrFail($request->detail_nota_id);
        $detail_nota->catatan_finishing = $request->catatan_finishing;
        $detail_nota->save();

        return redirect()->back();
    }

    function updateCatatan(Request $request){
        $detail_nota = Detail_nota::findOrFail($request->detail_nota_id);
        $detail_nota->catatan = $request->catatan;
        $detail_nota->save();

        return redirect()->back();
    }

    function uploadFile(Request $request){

        $this->validate($request, [
            'file_desain'=> 'image|max:2000'
        ]);

        $file_desain = $request->file("file_desain")->store("public/file_desain");

        $detail_nota = Detail_nota::find($request->detail_nota_id);
        $detail_nota->file_desain = $file_desain;
        $detail_nota->save();
        Storage::delete($request->file_lama);
        return redirect()->back();
    }

    function hapusItem($id){
        $detail_nota = Detail_nota::findOrFail($id);
        $detail_nota->delete();

        return redirect()->back();
    }

    function hapusNota(Request $request){
        $nota = Nota::findOrFail($request->id);
        $nota->delete();

        return redirect("/pemesanan");
    }
}
