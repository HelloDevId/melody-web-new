<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $visitors = Visitors::select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m-%d') as date"), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labelsvisitors = $visitors->pluck('date');
        $datavisitors = $visitors->pluck('total');

        $konsultasi = Antrian::select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m-%d') as date"), DB::raw('count(*) as total'))
            ->where('status', 'selesai')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labelskonsultasi = $konsultasi->pluck('date');
        $datakonsultasi = $konsultasi->pluck('total');


        $productssold = Product::sum('jumlah_terjual');
        $products = Product::count();
        $users = User::where('id_role', '2')->count();
        $categories = Kategori::count();

        return view('admin.pages.dashboard', [
            'products' => $products,
            'users' => $users,
            'categories' => $categories,
            'productssold' => $productssold,
            'labelsvisitors' => $labelsvisitors,
            'datavisitors' => $datavisitors,
            'labelskonsultasi' => $labelskonsultasi,
            'datakonsultasi' => $datakonsultasi,
        ]);
    }
}