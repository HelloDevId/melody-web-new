<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasi = Konsultasi::with('antrian')->get();
        return view('admin.pages.konsultasi', [
            'konsultasi' => $konsultasi
        ]);

    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {

    }
}