<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class ApiKonsultasiController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $id_user = $user->id;

        $konsultasi = Konsultasi::with('antrian.keluhan')->whereHas('antrian', function ($query) use ($id_user) {
            $query->where('id_user', $id_user)
            ->where('status', 'Selesai');
        })
        ->orderByDesc('id')
        ->get();

        return response()->json([
            'message' => 'success',
            'data' => $konsultasi,
        ], 200);
    }
    public function noantrian(Request $request)
    {
        $user = $request->user();
        $id_user = $user->id;

        $konsultasi = Konsultasi::with('antrian.keluhan')->whereHas('antrian', function ($query) use ($id_user) {
            $query->where('id_user', $id_user)
            ->where('status', 'Belum Selesai');
        })
        ->orderByDesc('id')
        ->get();

        return response()->json([
            'message' => 'success',
            'data' => $konsultasi,
        ], 200);
    }
}
