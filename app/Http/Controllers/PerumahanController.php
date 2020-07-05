<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use App\TipePerumahan as Tipe;
use App\Kelebihan;
use App\Fasilitas;
use App\DetailFasilitas;
use App\DetailKelebihan;
use App\DetailTipe;
use App\PerumahanImage;

class PerumahanController extends Controller
{
    public function index(){
        $perumahans = Perumahan::all();

        return view('admin.perumahan', compact('perumahans'));
    }

    public function create(){
        $fasilitases = Fasilitas::all();
        $kelebihans = Kelebihan::all();
        $types = Tipe::where('jenis_property', '=', 'rumah')->get();
        return view('admin.perumahan-create', compact('fasilitases','kelebihans','types'));
    }

    public function store_image(Request $request){
        $image = $request->file('file');
   
        $nama_file = $image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/perumahan'),$nama_file);
        $judul = $nama_file;
   
        return response()->json(['success'=>$judul]);
    }

    public function delete_image(Request $request){
        $filename =  $request->get('filename');
        $path=public_path('assets/admin/src/images/perumahan/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function findName(Request $request){
        if($request->perumahan_name){
            $type = Perumahan::where('perumahan_name','=',$request->perumahan_name)->count();
            if($type){
                $tipe = Perumahan::where('perumahan_name','=',$request->perumahan_name)->first();
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
        $perumahan = new Perumahan;
        $perumahan->perumahan_name = $request->perumahan_name;
        $perumahan->address = $request->alamat;
        $perumahan->description = $request->description;
        $perumahan->save();

        $kelebihans = json_decode($request->kelebihan);
        $types = json_decode($request->tipe);
        $images = json_decode($request->images);

        foreach($kelebihans as $kelebihan){
            $detailKelebihan = new DetailKelebihan;
            $detailKelebihan->perumahan_id = $perumahan->id;
            $detailKelebihan->kelebihan_id = $kelebihan;
            $detailKelebihan->nilai = 0;
            $detailKelebihan->save();
        }

        foreach($types as $type){
            $detailTipe = new DetailTipe;
            $detailTipe->tipe_rumah_id = $type;
            $detailTipe->perumahan_id = $perumahan->id;
            $detailTipe->save();
        }

        foreach($images as $image){
            $detailImage = new PerumahanImage;
            $detailImage->image = 'assets/admin/src/images/perumahan/'.$image;
            $detailImage->perumahan_id = $perumahan->id;
            $detailImage->save();
        }

        return response()->json(['success'=>'berhasil', 'id' => $perumahan->id]);

    }

    public function edit($perumahan){
        $perum = Perumahan::with('kelebihan', 'tipe', 'image', 'detailKelebihan')->find($perumahan);
        

        $notInKelebihan = [];
        $notInTipe = [];
        $statusKelebihan = 0;

        foreach($perum->kelebihan as $item){
            array_push($notInKelebihan, $item->id);
            if($item->pivot->nilai == 0){
                $statusKelebihan++;
            }
        }

        foreach($perum->tipe as $item){
            array_push($notInTipe, $item->id);
        }

        $kelebihans = Kelebihan::all()->whereNotIn('id',$notInKelebihan);

        $types = Tipe::where('jenis_property', '=', 'rumah')->whereNotIn('id',$notInTipe)->get();

        return view('admin.perumahan-edit', compact('perum', 'types', 'kelebihans', 'statusKelebihan'));
    }

    public function update(Request $request,$perumahan){
        $perum = Perumahan::find($perumahan);
        $perum->perumahan_name = $request->perumahan_name;
        $perum->address = $request->address;
        $perum->description = $request->description;
        $perum->save();

        return response()->json(['success' => 'berhasil']);
    }

    public function editKelebihan(Request $request){
        $detailKelebihan = DetailKelebihan::find($request->id);
        $detailKelebihan->nilai = $request->nilai;
        $detailKelebihan->save();

        return redirect(route('perumahan.edit', $detailKelebihan->perumahan_id));
    }

    public function deleteKelebihan(Request $request){
        $detailKelebihan = DetailKelebihan::find($request->id);
        $detailKelebihan->delete();

        return response()->json(['success' => 'Kelebihan Perumahan Berhasil dihapus']);
    }

    public function addKelebihan(Request $request){
        $detailKelebihan = new DetailKelebihan;
        $detailKelebihan->perumahan_id = $request->perumahan_id;
        $detailKelebihan->kelebihan_id = $request->kelebihan_id;
        $detailKelebihan->nilai = $request->nilai;
        $detailKelebihan->save();

        return redirect(route('perumahan.edit', $request->perumahan_id)); 
    }

    public function deleteTipe(Request $request){
        $detailTipe = DetailTipe::find($request->id);
        $detailTipe->delete();

        return response()->json(['success'=>'Tipe Perumahan berhasil dihapus']);
    }

    public function addTipe(Request $request){
        if(!is_null($request->tipe)){
            foreach($request->tipe as $item){
                $detailTipe = new DetailTipe;
                $detailTipe->perumahan_id = $request->perumahan_id;
                $detailTipe->tipe_rumah_id = $item;
                $detailTipe->save();
            }
            return redirect(route('perumahan.edit', $request->perumahan_id));        
        }else{
            return redirect('/admin/home');
        }

    }

    public function deleteGambar(Request $request){
        $image = PerumahanImage::find($request->id);
        $image->delete();

        return response()->json(['success' => 'Gambar berhasil dihapus']);
    }

    public function addGambar(Request $request){
        $image = $request->file('file');
   
        $nama_file = time().$image->getClientOriginalName();
        $image->move(public_path('assets/admin/src/images/perumahan'),$nama_file);
        
        $gambar = new PerumahanImage;
        $gambar->image = 'assets/admin/src/images/perumahan/'.$nama_file;
        $gambar->perumahan_id = $request->id;
        $gambar->save();
   
        return redirect('/admin/perumahan/'.$request->id.'/edit#view-gambar');
    }

    public function destroy(Request $request, $perumahan){
        $perum = Perumahan::find($perumahan);
        $perumh = $perum->perumahan_name;
        $perum->delete();
        return response()->json(['success'=>'berhasil', 'perumh' => $perumh]);
    }

}
