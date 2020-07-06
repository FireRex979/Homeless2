<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriFurniture;

class KategoriFurnitureController extends Controller
{
    public function index(){
        $kategoriFurnitures = KategoriFurniture::all();
        return view('admin.kategori-furniture', compact('kategoriFurnitures'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'category_name' => 'required|min:3|unique:category_furnitures',
        ]);

        $furniture = new KategoriFurniture;
        $furniture->category_name = $req->category_name;
        $furniture->save();
        return redirect('/admin/kategori-furniture')->with('status', 'Kategori baru berhasil dimasukkan');
    }

    public function edit($kategori_furniture){
        $furniture = KategoriFurniture::find($kategori_furniture);
        return response()->json(['success' => 'Berhasil', 'furniture' => $furniture]);
    }

    public function update(Request $req, $kategori_furniture){
        $this->validate($req,[
            'category_name' => 'required|min:3|unique:category_articles',
        ]);

        $arl = KategoriFurniture::find($kategori_furniture);
        $pesanFurniture['lama'] = $arl->category_name;
        $pesanFurniture['baru'] = $req->category_name;
        $arl->category_name = $req->category_name;
        $arl->save();
        return redirect('/admin/kategori-furniture')->with('status', 'Furniture telah berhasil diupdate')
        ->with('pesanFurniture', $pesanFurniture);
    }

    public function destroy(Request $req, $kategori_furniture){
        $arl = KategoriFurniture::find($kategori_furniture);
        $furniture = $arl->category_name;
        $arl->delete();
        return response()->json(['success'=>'berhasil', 'furniture' => $furniture]);
    }

}
