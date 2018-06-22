<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class PegawaiController extends Controller
{
    function index(){
    	$pegawai = User::where("id", "!=", Auth::user()->id)->orderBy("id", 'desc')->get();
    	return view("pegawai.index", compact('pegawai'));
    }

    function resetPassword(Request $request){
    	$pegawai = User::find($request->id);
    	$pegawai->password = Hash::make('123456');
    	$pegawai->save();

    	return redirect()->back();
    }

    function update(Request $request){
    	$pegawai = User::find($request->id);
    	$pegawai->name = $request->nama;
    	$pegawai->email = $request->email;
    	$pegawai->type = $request->type;
    	
    	try {
    		$pegawai->save();
    	} catch (\Illuminate\Database\QueryException $e) {
    		$error = "Email sudah digunakan";
    		return view("layouts.error", compact('error'));
    	}

    	return redirect()->back();
    }

    function baru(){
    	return view("pegawai.tambah");
    }

    function simpan(Request $request){
    	$pegawai = new User;
    	$pegawai->name = $request->nama;
    	$pegawai->email = $request->email;
    	$pegawai->type = $request->type;

    	if($request->password == $request->ulangi_password){
    		$pegawai->password = $request->password;
    		$pegawai->save();

    		return redirect("/pegawai");
    	}

    	return redirect()->back();
    }

}
