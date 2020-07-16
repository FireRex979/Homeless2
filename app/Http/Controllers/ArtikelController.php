<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Artikel;
use App\KategoriArtikel as Kategori;
use App\ArtikelImage as Image;
use Illuminate\Validation\Rule;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::with('kategori')->get();

        return view('admin.artikel', compact('artikels'));
    }

    public function create(){
        $kategori = Kategori::all();

        return view('admin.artikel-create', compact('kategori'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|min:3|unique:articles',
        ]);

        $artikel = new Artikel;
        $arrImage = [];
        $detail = $request->content;
        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/images/'. uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $link = asset('storage'.$path);
                $image->setAttribute('src', $link);
                array_push($arrImage, 'storage'.$path);
            }
        }

        $detail = $dom->savehtml();

        $artikel->title = $request->title;
        $artikel->content = $detail;
        $artikel->admin_id = 1;
        $artikel->category_id = $request->kategori;
        $artikel->save();

        foreach($arrImage as $item){
            $artikelImage = new Image;
            $artikelImage->article_id = $artikel->id;
            $artikelImage->image = $item;
            $artikelImage->save();
        }

        return redirect(route('artikel.index'));
    }

    public function show($id){
        $artikel = Artikel::find($id);

        return view('admin.artikel-show', compact('artikel'));
    }

    public function edit($id){
        $artikel = Artikel::with('kategori')->find($id);
        $kategori = Kategori::all();

        return view('admin.artikel-edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, $id){
        $artikel = Artikel::find($id);
        $arrImage = [];
        $idImage = [];

        $this->validate($request,[
            'title' => 'required|min:3,'.Rule::unique('articles')->ignore($artikel->id),
        ]);

        
        $artikelImage = Image::where('article_id','=',$artikel->id)->get();

        $detail = $request->content;
        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/images/'. uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $link = asset('storage'.$path);
                $image->setAttribute('src', $link);
                array_push($arrImage, 'storage'.$path);
            }

            if($artikelImage){
                foreach($artikelImage as $item){
                    $src = str_replace('/',' ',$src);
                    $item->image = str_replace('/', ' ',$item->image);
                    if(preg_match('/'.$item->image.'/',$src)){
                        array_push($idImage, $item->id);
                    break;
                    }
                }    
            }
        }

        // dd($idImage);

        if($artikelImage->count() != sizeof($idImage)){
            Image::whereNotIn('id', $idImage)->delete();
        }

        $detail = $dom->savehtml();

        $artikel->title = $request->title;
        $artikel->content = $detail;
        $artikel->admin_id = 1;
        $artikel->category_id = $request->kategori;
        $artikel->save();

        foreach($arrImage as $item){
            $gambar = new Image;
            $gambar->article_id = $artikel->id;
            $gambar->image = $item;
            $gambar->save();
        }

        return redirect(route('artikel.index'));
    }

    public function destroy($id){
        $artikel = Artikel::find($id);
        $artikel->delete();

        return response()->json(['success'=>'berhasil']);
    }
}
