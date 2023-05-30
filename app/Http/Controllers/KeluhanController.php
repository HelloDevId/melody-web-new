<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Models\Keluhan;

class KeluhanController extends Controller
{
    public function index()
    {
        $keluhan = Keluhan::all();
        return view('admin.pages.keluhan', [
            'keluhan' => $keluhan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:tb_keluhan,name',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.unique' => 'Nama sudah ada',
            ]
        );

        $keluhan = new Keluhan;
        $keluhan->name = $request->name;

        $keluhan->save();
        return redirect()->intended('/keluhan')->with('create', 'berhasil create');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:tb_keluhan,name,' . $id . '',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.unique' => 'Nama sudah ada',
            ]
        );

        $keluhan = Keluhan::find($id);
        $keluhan->name = $request->name;

        $keluhan->save();
        return redirect()->intended('/keluhan')->with('update', 'berhasil update');
    }

    public function destroy($id)
    {

        $cekkeluhan = Antrian::where('id_keluhan', $id)->first();
        if ($cekkeluhan) {
            return redirect()->intended('/keluhan')->with('gagal', 'gagal delete');
        } else {
            $keluhan = Keluhan::find($id);
            $keluhan->delete();

            return redirect()->intended('/keluhan')->with('delete', 'berhasil delete');

        }

    }
}