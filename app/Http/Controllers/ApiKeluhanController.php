<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class ApiKeluhanController extends Controller
{
    public function keluhan()
    {
        $keluhan = Keluhan::all();

        return response()->json([
            'message' => 'success',
            'keluhan' => $keluhan,
        ]);
    }
}
