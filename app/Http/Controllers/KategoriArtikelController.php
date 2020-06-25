<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
        $artikels = KategoriArtikel::all();
        return view('admin.kategori_artikel', compact('artikels'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'category_name' => 'required|min:3|unique:category_articles',
        ]);

        $artikel = new KategoriArtikel;
        $artikel->category_name = $req->category_name;
        $artikel->save();
        return redirect('/admin/kategori-artikel')->with('status', 'Kategori baru berhasil dimasukkan');
    }

    public function edit($kategori_artikel){
        $artikel = KategoriArtikel::find($kategori_artikel);
        return response()->json(['success' => 'Berhasil', 'artikel' => $artikel]);
    }

    public function update(Request $req, $kategori_artikel){
        $this->validate($req,[
            'category_name' => 'required|min:3|unique:category_articles',
        ]);

        $arl = KategoriArtikel::find($kategori_artikel);
        $pesanArtikel['lama'] = $arl->category_name;
        $pesanArtikel['baru'] = $req->category_name;
        $arl->category_name = $req->category_name;
        $arl->save();
        return redirect('/admin/kategori-artikel')->with('status', 'Artikel telah berhasil diupdate')
        ->with('pesanArtikel', $pesanArtikel);
    }

    public function destroy(Request $req, $kategori_artikel){
        $arl = KategoriArtikel::find($kategori_artikel);
        $artikel = $arl->category_name;
        $arl->delete();
        return response()->json(['success'=>'berhasil', 'artikel' => $artikel]);
    }

}
