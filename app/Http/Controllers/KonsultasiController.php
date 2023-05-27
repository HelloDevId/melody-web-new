<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $antrian = Antrian::where('status', 'Belum Selesai')->get();

        $konsultasi = Konsultasi::with('antrian')->get();
        return view('admin.pages.konsultasi', [
            'konsultasi' => $konsultasi,
            'antrian' => $antrian,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'id_antrian' => 'required',
            'hasil_konsultasi' => 'required',
        ], [
                'id_antrian.required' => 'Nomer Antrian tidak boleh kosong',
                'hasil_konsultasi.required' => 'Hasil konsultasi tidak boleh kosong',

            ]);

        $cekkonsultasi = Konsultasi::where('id_antrian', $request->id_antrian)->first();
        if ($cekkonsultasi) {
            return redirect()->intended('/konsultasi')->with('sudahada', 'Data sudah ada');
        } else {

            Konsultasi::create([
                'id_antrian' => $request->id_antrian,
                'hasil_konsultasi' => $request->hasil_konsultasi,
            ]);

            return redirect()->intended('/konsultasi')->with('create', 'berhasil update');

        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hasil_konsultasi' => 'required',
        ], [
                'hasil_konsultasi.required' => 'Hasil konsultasi tidak boleh kosong',

            ]);

        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->update([
            'hasil_konsultasi' => $request->hasil_konsultasi,
        ]);

        return redirect()->intended('/konsultasi')->with('update', 'berhasil update');

    }

    public function destroy($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->delete();

        return redirect()->intended('/konsultasi')->with('delete', 'berhasil update');

    }
}