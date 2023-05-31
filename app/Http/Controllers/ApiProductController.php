<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 7);
        $page = $request->query('page', 1);

        $products = Product::where('deleted_at', null)
            ->orderByDesc('id')
            ->paginate($perPage, ['*'], 'page', $page); 

        return response()->json([
            'message' => 'success',
            'data' => $products
        ]);
    }

    public function all()
    {
        $products = Product::where('deleted_at', null)
            ->orderByDesc('id')->get();

        return response()->json([
            'message' => 'success',
            'data' => $products
        ]);
    }

    public function show($id_kategori)
    {
        try {
            $products = Product::where('id_kategori', $id_kategori)
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->get();

            if ($products->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No products found for the specified category.'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch products.'
            ], 500);
        }
    }
}
