<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelebihan;

class KelebihanController extends Controller
{
    public function index(){
        $kelebihans = Kelebihan::all();
        return view('admin.kelebihan', compact('kelebihans'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'kelebihan' => 'required|min:3',
        ]);

        $kelebihan = new Kelebihan;
        $kelebihan->kelebihan = $req->kelebihan;
        $kelebihan->satuan = $req->satuan;
        $kelebihan->save();
        return redirect('/admin/kelebihan')->with('status', 'Kelebihan baru berhasil dimasukkan');
    }

    public function edit($kelebihan){
        $lebih = Kelebihan::find($kelebihan);
        return response()->json(['success' => 'Berhasil', 'kelebihan' => $lebih]);
    }

    public function update(Request $req, $kelebihan){
        $this->validate($req,[
            'kelebihan' => 'required|min:3',
        ]);

        $lebih = Kelebihan::find($kelebihan);
        $lebih->kelebihan = $req->kelebihan;
        $lebih->satuan = $req->satuan;
        $lebih->save();
        return redirect('/admin/kelebihan')->with('status', 'Fasilitas telah berhasil diupdate');
    }

    public function destroy(Request $req, $kelebihan){
        $lebih = Kelebihan::find($kelebihan);
        $kelebihan = $lebih->kelebihan;
        $lebih->delete();
        return response()->json(['success'=>'berhasil', 'fasilitas' => $kelebihan]);
    }
}
