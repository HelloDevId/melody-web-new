<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kulit;
use App\Models\User;

class KulitController extends Controller
{
    public function index()
    {
        $kulit = Kulit::all();
        return view('admin.pages.kulit', [
            'kulit' => $kulit,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:tb_kulit,name',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.unique' => 'Nama sudah ada',
            ]
        );

        $kulit = new Kulit;
        $kulit->name = $request->name;

        $kulit->save();
        return redirect()->intended('/kulit')->with('create', 'berhasil create');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:tb_kulit,name,' . $id . '',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.unique' => 'Nama sudah ada',
            ]
        );

        $kulit = Kulit::find($id);
        $kulit->name = $request->name;

        $kulit->save();
        return redirect()->intended('/kulit')->with('update', 'berhasil update');
    }

    public function destroy($id)
    {

        $cekdatakulit = User::where('id_kulit', $id)->first();
        if ($cekdatakulit) {
            return redirect()->intended('/kulit')->with('gagal', 'gagal delete');
        } else {
            $kulit = Kulit::find($id);
            $kulit->delete();

            return redirect()->intended('/kulit')->with('delete', 'berhasil delete');
        }

    }
}