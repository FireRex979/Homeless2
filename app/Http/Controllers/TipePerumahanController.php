<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipePerumahan as Tipe;
use App\TipePerumahanImages as Image;
use App\Fasilitas;
use App\DetailFasilitas;

class TipePerumahanController extends Controller
{
    private $judulku = array();

    public function index(){
        $types = Tipe::all();
        return view('admin.tipe', compact('types'));
    }

    public function create(){
        $fasilitases = Fasilitas::all();

        return view('admin.tipe-create', compact('fasilitases'));
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
        $fasilitases = json_decode($request->fasilitas);

        foreach($fasilitases as $fasilitas){
            $detailFasilitas = new DetailFasilitas;
            $detailFasilitas->tipe_rumah_id = $type->id;
            $detailFasilitas->fasilitas_id = $fasilitas;
            $detailFasilitas->jumlah = 0;
            $detailFasilitas->save();
        }


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
        $type = Tipe::with('images', 'fasilitas')->find($tipe);

        $notInFasilitas = [];
        $statusFasilitas = 0;

        foreach($type->fasilitas as $item){
            array_push($notInFasilitas, $item->id);
            if($item->pivot->jumlah == 0){
                $statusFasilitas++;
            }
        }

        $fasilitases = Fasilitas::all()->whereNotIn('id', $notInFasilitas);

        return view('admin.tipe-edit', compact('type','statusFasilitas', 'fasilitases'));
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

    public function destroy(Request $request, $tipe){
        $type = Tipe::find($tipe);
        $tipe = $type->tipe_name;
        $type->delete();
        return response()->json(['success'=>'berhasil', 'tipe' => $tipe]);
    }

    public function editFasilitas(Request $request){
        $detailFasilitas = DetailFasilitas::find($request->id);
        $detailFasilitas->jumlah = $request->jumlah;
        $detailFasilitas->save();

        return redirect(route('tipe.edit', $detailFasilitas->tipe_rumah_id));
    }

    public function addFasilitas(Request $request){
        $detailFasilitas = new DetailFasilitas;
        $detailFasilitas->tipe_rumah_id = $request->tipe_rumah_id;
        $detailFasilitas->fasilitas_id = $request->fasilitas_id;
        $detailFasilitas->jumlah = $request->jumlah;
        $detailFasilitas->save();

        return redirect(route('tipe.edit', $request->tipe_rumah_id)); 
    }

    public function deleteFasilitas(Request $request){
        $detailFasilitas = DetailFasilitas::find($request->id);
        $detailFasilitas->delete();

        return response()->json(['success' => 'Fasilitas Perumahan Berhasil dihapus']);
    }

}
