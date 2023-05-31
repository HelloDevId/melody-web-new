<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Keluhan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class ApiAntrianController extends Controller
{
    public function insert(Request $request)
    {
        $user = $request->user();
        $id_user = $user->id;

        $request->validate([
            'tanggal' => 'required',
            'id_keluhan' => 'required',
            'detail_keluhan' => 'required'
        ]);
        $antrianBelumSelesai = Antrian::where('id_user', $id_user)
        ->where('status', 'Belum Selesai')
        ->first();

        if ($antrianBelumSelesai) {
            return response()->json([
                'message' => 'Tidak dapat menambah antrian. Masih ada antrian yang belum selesai.',
            ], 500);
        }

        $nomor_antrian_terakhir = Antrian::max('no_antrian');
        $nomor_antrian_baru = $nomor_antrian_terakhir + 1;

        $antrian = Antrian::create([
            'id_user' => $id_user,
            'no_antrian' => $nomor_antrian_baru,
            'id_keluhan' => $request->id_keluhan,
            'tanggal' => $request->tanggal,
            'detail_keluhan' => $request->detail_keluhan,
            'status' => 'Belum Selesai'
        ]);

        $konsultasi = Konsultasi::create([
            'id_antrian' => $antrian->id,
            'hasil_konsultasi' => ''
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $antrian,
        ], 200);
    }
}
