<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.pages.kategori', [
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:30|unique:tb_kategori,name|alpha',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'name.unique' => 'Nama sudah ada',
                'name.alpha' => 'Nama harus berupa string',
            ]
        );

        $kategori = new Kategori;
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->intended('/kategori')->with('create', 'berhasil create');

    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'name' => 'required|max:30|alpha|unique:tb_user,email,' . $id,
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'name.unique' => 'Nama sudah ada',
                'name.alpha' => 'Nama harus berupa string',
            ]
        );

        $kategori = Kategori::find($id);
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->intended('/kategori')->with('update', 'berhasil update');

    }

    public function destroy($id)
    {

        $cekidkategori = Product::where('id_kategori', $id)->first();
        if ($cekidkategori) {
            return redirect()->intended('/kategori')->with('gagal', 'kategori masih digunakan');
        } else {

            $kategori = Kategori::find($id);
            $kategori->delete();

            return redirect()->intended('/kategori')->with('delete', 'berhasil delete');
        }

    }

    public function restorekategori()
    {
        $kategori = Kategori::onlyTrashed()->get();
        return view('admin.pages.kategori-terhapus', [
            'kategori' => $kategori,
        ]);
    }
    public function restore($id)
    {
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