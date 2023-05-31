<?php

namespace App\Http\Controllers;

use App\Models\Kulit;
use Illuminate\Http\Request;

class ApiKulitController extends Controller
{
    public function kulit()
    {
        $skins = Kulit::all();

        return response()->json([
            'message' => 'success',
            'skins' => $skins,
        ]);
    }
}
