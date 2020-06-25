<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;

class FasilitasController extends Controller
{
    public function index(){
        $fasilitases = Fasilitas::all();
        return view('admin.fasilitas', compact('fasilitases'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'fasilitas' => 'required|min:3|unique:fasilitas',
        ]);

        $fasilitas = new Fasilitas;
        $fasilitas->fasilitas = $req->fasilitas;
        $fasilitas->save();
        return redirect('/admin/fasilitas')->with('status', 'Fasilitas baru berhasil dimasukkan');
    }

    public function edit($fasilita){
        $fasilitas = Fasilitas::find($fasilita);
        return response()->json(['success' => 'Berhasil', 'fal' => $fasilitas]);
    }

    public function update(Request $req, $fasilita){
        $this->validate($req,[
            'fasilitas' => 'required|min:3|unique:fasilitas',
        ]);

        $fal = Fasilitas::find($fasilita);
        $pesanFasilitas['lama'] = $fal->fasilitas;
        $pesanFasilitas['baru'] = $req->fasilitas;
        $fal->fasilitas = $req->fasilitas;
        $fal->save();
        return redirect('/admin/fasilitas')->with('status', 'Fasilitas telah berhasil diupdate')
        ->with('pesanFasilitas', $pesanFasilitas);
    }

    public function destroy(Request $req, $fasilita){
        $fal = Fasilitas::find($fasilita);
        $fasilitas = $fal->fasilitas;
        $fal->delete();
        return response()->json(['success'=>'berhasil', 'fasilitas' => $fasilitas]);
    }
}
