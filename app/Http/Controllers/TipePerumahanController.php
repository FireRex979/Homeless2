<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipePerumahan as Tipe;
use App\TipePerumahanImages as Image;

class TipePerumahanController extends Controller
{
    private $judulku = array();

    public function index(){
        $types = Tipe::all();
        return view('admin.tipe', compact('types'));
    }

    public function create(){
        return view('admin.tipe-create');
    }

    public function store_image(Request $request){
        $image = $request->file('file');
   
        $nama_file = $image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/tipe'),$nama_file);
        $judul = $nama_file;
   
        return response()->json(['success'=>$judul]);
    }

    public function store(Request $request){
        $type = new Tipe;
        $type->tipe_name = $request->tipe_name;
        $type->jenis_property = $request->jenis_property;
        $type->price = $request->price;
        $type->description = $request->description;
        $type->land_size = $request->land_size;
        $type->home_size = $request->home_size;
        $type->save();

        $images = json_decode($request->images);

        foreach($images as $item){
            $image = new Image;
            $image->image = 'assets/admin/src/images/tipe/'.$item;
            $image->tipe_rumah_id = $type->id;
            $image->save();
        }

        return response()->json(['success'=>$type->id]);
    }

    public function delete_image(Request $request){
        $filename =  $request->get('filename');
        $path=public_path('assets/admin/src/images/tipe/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function findName(Request $request){
        if($request->tipe_name){
            $type = Tipe::where('tipe_name','=',$request->tipe_name)->count();
            if($type){
                $tipe = Tipe::where('tipe_name','=',$request->tipe_name)->first();
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

    public function edit($tipe){
        $type = Tipe::with('images')->find($tipe);
        return view('admin.tipe-edit', compact('type'));
    }

    public function update(Request $request, $tipe){
        $type = Tipe::find($tipe);
        $type->tipe_name = $request->tipe_name;
        $type->jenis_property = $request->jenis_property;
        $type->price = $request->price;
        $type->description = $request->description;
        $type->land_size = $request->land_size;
        $type->home_size = $request->home_size;
        $type->save();

        return response()->json(['success' => 'berhasil']);
    }

    public function addGambar(Request $request){
        $image = $request->file('file');
   
        $nama_file = time().$image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/tipe'),$nama_file);
        
        $gambar = new Image;
        $gambar->image = 'assets/admin/src/images/tipe/'.$nama_file;
        $gambar->tipe_rumah_id = $request->id;
        $gambar->save();
   
        return redirect('/admin/tipe/'.$request->id.'/edit#view-gambar');

    }

    public function deleteGambar(Request $request){
        $image = Image::find($request->id);
        $image->delete();

        return response()->json(['success' => 'Gambar berhasil dihapus']);
    }

}
