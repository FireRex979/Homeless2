<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaketFurniture;
use App\Furniture;
use App\PaketFurnitureDetail;

class PaketFurnitureController extends Controller
{
    public function index(){
        $paketFurnitures = PaketFurniture::with('furniture')->get();
        $furnitures = Furniture::all();

        return view('admin.paket', compact('paketFurnitures', 'furnitures'));
    }

    public function totalHarga(Request $request){
        $furniture = json_decode($request->furniture);
        $totalHarga = 0;
        
        foreach($furniture as $item){
            $ftr = Furniture::find($item);
            $totalHarga+=$ftr->price;
        }

        return response()->json(['success' => $totalHarga]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'paket_name' => 'required|min:3|unique:paket_furnitures',
        ]);

        $paket =  new PaketFurniture;
        $paket->paket_name = $request->paket_name;
        $paket->price_total = $request->price;
        $paket->description = $request->description;
        $paket->save();

        foreach($request->furniture as $item){
            $paketDetail = new PaketFurnitureDetail;
            $paketDetail->paket_id = $paket->id;
            $paketDetail->furniture_id = $item;
            $paketDetail->save();
        }

        return redirect(route('paket-furniture.index'));
    }

    public function edit($paket_furniture){
        $paket = PaketFurniture::with(['furniture' => function($q){
            $q->with('kategori');
        }])->find($paket_furniture);
        $idKecuali = [];
        $harga = 0;
        foreach($paket->furniture as $item){
            array_push($idKecuali, $item->id);
            $harga+=$item->price;
        }

        $furnitures =  Furniture::with('kategori')->whereNotIn('id', $idKecuali)->get();

        return view('admin.paket-edit', compact('paket', 'furnitures', 'harga'));
    }

    public function find(Request $request){
        if($request->paket_name){
            $type = PaketFurniture::where('paket_name','=',$request->paket_name)->count();
            if($type){
                $tipe = PaketFurniture::where('paket_name','=',$request->paket_name)->first();
                $id = $tipe->id; 
            }else{
                $id = 0;
            }
        }else{
            $type = 0;
            $id = 0;
        }
        return response()->json(['qty' => $type, 'id' => $id]);    
    }

    public function update(Request $request, $id){
        $paket = PaketFurniture::find($id);

        $paket->paket_name = $request->paket_name;
        $paket->price_total = $request->price_total;
        $paket->description = $request->description;
        $paket->save();

        return response()->json(['success' => 'Paket Furniture berhasil diupdate']);
    }

    public function addFurniture(Request $request){
        $paketDetail = new PaketFurnitureDetail;
        $paketDetail->furniture_id = $request->furniture_id;
        $paketDetail->paket_id = $request->paket_id;
        $paketDetail->save();

        return redirect(route('paket-furniture.edit', $request->paket_id));
    }

    public function deleteFurniture(Request $request){
        $paketDetail = PaketFurnitureDetail::find($request->id);
        $paketDetail->delete();

        return response()->json(['success' => 'berhasil di hapus']);
    }

    public function destroy($paket_furniture){
        $paket = PaketFurniture::find($paket_furniture);
        $paket->delete();

        return response()->json(['success'=>'berhasil']);
    }
}
