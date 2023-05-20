<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Visitors;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $visitors = Visitors::select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m-%d') as date"), DB::raw('count(*) as total'))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        $labels = $visitors->pluck('date');
        $data = $visitors->pluck('total');

     
        $productssold = Product::sum('jumlah_terjual');
        $products = Product::count();
        $users = User::where('id_role', '2')->count();
        $categories = Kategori::count();
    
        return view('admin.pages.dashboard', [
            'products' => $products,
            'users' => $users,
            'categories' => $categories,
            'productssold' => $productssold,
            'labels' => $labels,
            'data' => $data
           
        ]);
    }
}
