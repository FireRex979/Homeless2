<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Furniture;
use App\KategoriFurniture;
use App\FurnitureImage;

class FurnitureController extends Controller
{
    public function index(){
        $furnitures = Furniture::all();

        return view('admin.furniture',compact('furnitures'));
    }

    public function create(){
        $kategoriFurnitures = KategoriFurniture::all();

        return view('admin.furniture-create', compact('kategoriFurnitures'));
    }

    public function storeImage(Request $request){
        $image = $request->file('file');
   
        $nama_file = $image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/furniture'),$nama_file);
        $judul = $nama_file;
   
        return response()->json(['success'=>$judul]);
    }

    public function deleteImage(Request $request){
        $filename =  $request->get('filename');
        $path=public_path('assets/admin/src/images/furniture/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function find(Request $request){
        if($request->tipe_name){
            $type = Furniture::where('furniture_name','=',$request->tipe_name)->count();
            if($type){
                $tipe = Furniture::where('furniture_name','=',$request->tipe_name)->first();
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

    public function store(Request $request){
        $furniture = new Furniture;
        $furniture->furniture_name = $request->furniture_name;
        $furniture->description = $request->description;
        $furniture->price = $request->price;
        $furniture->category_id = $request->kategori;
        $furniture->save();

        $images = json_decode($request->images);

        foreach($images as $item){
            $image = new FurnitureImage;
            $image->furniture_image = 'assets/admin/src/images/furniture/'.$item;
            $image->furniture_id = $furniture->id;
            $image->save();
        }

        return response()->json(['success'=>$furniture->id]);      
    }

    public function edit($furniture){
        $ftr = Furniture::with('image')->find($furniture);
        $kategoriFurnitures = KategoriFurniture::all();

        return view('admin.furniture-edit', compact('ftr', 'kategoriFurnitures'));
    }

    public function update(Request $request, $furniture){
        $ftr = Furniture::find($furniture);
        $ftr->furniture_name = $request->furniture_name;
        $ftr->description = $request->description;
        $ftr->price = $request->price;
        $ftr->category_id = $request->category_id;
        $ftr->save();

        return response()->json(['success'=> 'Furniture telah berhasil di update']);
    }

    public function addGambar(Request $request){
        $image = $request->file('file');
   
        $nama_file = time().$image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/furniture'),$nama_file);
        
        $gambar = new FurnitureImage;
        $gambar->furniture_image = 'assets/admin/src/images/furniture/'.$nama_file;
        $gambar->furniture_id = $request->id;
        $gambar->save();
   
        return redirect('/admin/furniture/'.$request->id.'/edit#view-gambar');
    }

    public function deleteGambar(Request $request){
        $image = FurnitureImage::find($request->id);
        $image->delete();

        return response()->json(['success' => 'Gambar berhasil dihapus']);
    }

    public function destroy($furniture){
        $ftr = Furniture::find($furniture);
        $ftr->delete();

        return response()->json(['success' => 'berhasil terhapus']);
    }

    
}
