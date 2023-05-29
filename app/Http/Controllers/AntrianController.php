<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Antrian;
use App\Models\Keluhan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $datauser = User::with('role')
            ->where('id_role', '2')
            ->get();

        $datakeluhan = Keluhan::all();

        $antrian = Antrian::with('user', 'keluhan')->get();
        return view('admin.pages.antrian', [
            'antrian' => $antrian,
            'datauser' => $datauser,
            'datakeluhan' => $datakeluhan,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_user' => 'required',
                'id_keluhan' => 'required',
                'detail_keluhan' => 'required',
                'tanggal' => 'required',
            ],
            [
                'id_user.required' => 'ID User harus diisi',
                'id_keluhan.required' => 'ID Keluhan harus diisi',
                'detail_keluhan.required' => 'Detail Keluhan harus diisi',
                'tanggal.required' => 'Tanggal harus diisi',
            ],
        );

        $cekantrian = Antrian::where('id_user', $request->id_user)->where('tanggal', $request->tanggal)->first();
        if ($cekantrian) {
            return redirect()->back()->with('sudahada', 'Anda sudah mendaftar antrian pada tanggal tersebut');
        }

        $noantrian = Antrian::where('tanggal', $request->tanggal)->count();
        $noantrian += 1;

        Antrian::create([
            'id_user' => $request->id_user,
            'id_keluhan' => $request->id_keluhan,
            'detail_keluhan' => $request->detail_keluhan,
            'tanggal' => $request->tanggal,
            'no_antrian' => $noantrian,
            'status' => 'Belum Selesai',
        ]);

        return redirect()->back()->with('create', 'Berhasil mendaftar antrian');

    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'id_keluhan' => 'required',
                'detail_keluhan' => 'required',
                'status' => 'required',
            ],
            [

                'id_keluhan.required' => 'ID Keluhan harus diisi',
                'detail_keluhan.required' => 'Detail Keluhan harus diisi',
                'status.required' => 'Status harus diisi',
            ],
        );

        $antrian = Antrian::find($id);
        $antrian->update([
            'id_keluhan' => $request->id_keluhan,
            'detail_keluhan' => $request->detail_keluhan,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('update', 'Berhasil mengubah antrian');
    }



    public function destroy($id)
    {
        $cekidnoantrian = Konsultasi::where('id_antrian', $id)->first();
        if ($cekidnoantrian) {
            return redirect()->back()->with('gagal', 'Gagal menghapus antrian, karena antrian sudah digunakan');
        } else {
            $antrian = Antrian::find($id);
            $antrian->delete();

            return redirect()->back()->with('delete', 'Berhasil menghapus antrian');
        }
    }
}