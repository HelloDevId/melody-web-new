<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $datauser = User::with('role')
            ->where('id_role', '2')
            ->get();

        $antrian = Antrian::with('user')->get();
        return view('admin.pages.antrian', [
            'antrian' => $antrian,
            'datauser' => $datauser,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_user' => 'required',
                'tanggal' => 'required',
            ],
            [
                'id_user.required' => 'ID User harus diisi',
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
                'status' => 'required',
            ],
            [

                'status.required' => 'Status harus diisi',
            ],
        );

        $antrian = Antrian::find($id);
        $antrian->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('update', 'Berhasil mengubah antrian');
    }



    public function destroy($id)
    {
        $antrian = Antrian::find($id);
        $antrian->delete();

        return redirect()->back()->with('delete', 'Berhasil menghapus antrian');
    }
}