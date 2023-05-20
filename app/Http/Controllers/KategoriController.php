<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.pages.kategori',[
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
        ]);

        $kategori = new Kategori;
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->intended('/kategori')->with('create', 'berhasil create');

    }

    public function update(Request $request, $id){
        
        $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
        ]);

        $kategori = Kategori::find($id);
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->intended('/kategori')->with('update', 'berhasil update');

    }

    public function destroy($id){

        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->intended('/kategori')->with('delete', 'berhasil delete');
        
       
    }

    public function restorekategori(){
        $kategori = Kategori::onlyTrashed()->get();
        return view('admin.pages.kategori-terhapus',[
            'kategori' => $kategori,
        ]);
    }
    public function restore($id){
        $kategori = Kategori::onlyTrashed()->where('id', $id);
        $kategori->restore();

        return redirect()->intended('/kategori-restore')->with('restore', 'berhasil restore');
    }

    public function forcedeletekategori($id)
    {
        $kategori = Kategori::onlyTrashed()->where('id', $id);
        $kategori->forceDelete();

        return redirect()->intended('/kategori-restore')->with('delete', 'berhasil delete');
     
    }

}




