<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('kategori')->get();

        $kategori = Kategori::all();
        return view('admin.pages.product', [
            'product' => $product,
            'kategori' => $kategori,
        ]);
    }

    public function indexlanding(Request $request)
    {

        $ip = $request->ip();
        $browser = $request->header('User-Agent');

        Visitors::create([
            'ip_address' => $ip,
            'browser' => $browser,

        ]);


        $datakategori = Kategori::all();

        foreach ($datakategori as $kategori) {
            $topproduct = Product::with('kategori')->where('id_kategori', $kategori->id)->orderBy('jumlah_terjual', 'desc')->limit(5)->get();
        }

        $product = Product::with('kategori')->paginate(16);
        return view('landing.pages.index', [
            'product' => $product,
            'datakategori' => $datakategori,
            'topproduct' => $topproduct,

        ]);
    }

    public function detailproduct($id)
    {
        $product = Product::with('kategori')->where('id', $id)->first();
        $relate = Product::with('kategori')->where('id_kategori', $product->id_kategori)->limit(5)->get();


        return view('landing.pages.detail-product', [
            'product' => $product,
            'relate' => $relate,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harga' => 'required|max:12|min:4|numeric',
                'deskripsi' => 'required',
                'jumlah_terjual' => 'required',
                'id_kategori' => 'required',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'image.required' => 'Foto tidak boleh kosong',
                'image.image' => 'Foto harus berupa gambar',
                'image.max' => 'Foto maksimal 2MB',
                'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                'harga.required' => 'Harga tidak boleh kosong',
                'harga.max' => 'Harga maksimal 12 digit',
                'harga.min' => 'Harga minimal 4 digit',
                'harga.numeric' => 'Harga harus berupa angka',
                'jumlah_terjual.required' => 'Jumlah terjual tidak boleh kosong',
                'description.required' => 'Deskripsi tidak boleh kosong',
                'id_kategori.required' => 'Kategori tidak boleh kosong',
            ]
        );

        $fileNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('foto/product/'), $fileNameImage);

        $product = new Product;
        $product->name = $request->name;
        $product->image = $fileNameImage;
        $product->price = $request->harga;
        $product->jumlah_terjual = $request->jumlah_terjual;
        $product->description = $request->deskripsi;
        $product->id_kategori = $request->id_kategori;
        $product->save();

        return redirect()->intended('/product')->with('create', 'berhasil create');
    }

    public function update(Request $request, $id)
    {

        if ($request->image) {
            $request->validate(
                [
                    'name' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'harga' => 'required|max:12|min:4|numeric',
                    'deskripsi' => 'required',
                    'jumlah_terjual' => 'required',
                    'id_kategori' => 'required',
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'image.required' => 'Foto tidak boleh kosong',
                    'image.image' => 'Foto harus berupa gambar',
                    'image.max' => 'Foto maksimal 2MB',
                    'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                    'harga.required' => 'Harga tidak boleh kosong',
                    'harga.max' => 'Harga maksimal 12 digit',
                    'harga.min' => 'Harga minimal 4 digit',
                    'harga.numeric' => 'Harga harus berupa angka',
                    'jumlah_terjual.required' => 'Jumlah terjual tidak boleh kosong',
                    'description.required' => 'Deskripsi tidak boleh kosong',
                    'id_kategori.required' => 'Kategori tidak boleh kosong',
                ]
            );

            $deleteimage = Product::where('id', $id)->first();
            File::delete(public_path('foto/product') . '/' . $deleteimage->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/product/'), $fileNameImage);

            $product = Product::find($id);
            $product->name = $request->name;
            $product->image = $fileNameImage;
            $product->price = $request->harga;
            $product->jumlah_terjual = $request->jumlah_terjual;
            $product->description = $request->deskripsi;
            $product->id_kategori = $request->id_kategori;
            $product->save();

            return redirect()->intended('/product')->with('update', 'berhasil update');
        } else {
            $request->validate(
                [
                    'name' => 'required',
                    'harga' => 'required|max:12|min:4|numeric',
                    'jumlah_terjual' => 'required',
                    'deskripsi' => 'required',
                    'id_kategori' => 'required',
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'harga.required' => 'Harga tidak boleh kosong',
                    'harga.max' => 'Harga maksimal 12 digit',
                    'harga.min' => 'Harga minimal 4 digit',
                    'harga.numeric' => 'Harga harus berupa angka',
                    'jumlah_terjual.required' => 'Jumlah terjual tidak boleh kosong',
                    'description.required' => 'Deskripsi tidak boleh kosong',
                    'id_kategori.required' => 'Kategori tidak boleh kosong',
                ]
            );


            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->harga;
            $product->jumlah_terjual = $request->jumlah_terjual;
            $product->description = $request->deskripsi;
            $product->id_kategori = $request->id_kategori;
            $product->save();

            return redirect()->intended('/product')->with('update', 'berhasil update');
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        if ($ids != null) {

            $product = Product::whereIn('id', $ids);
            $product->delete();

            if ($product) {
                return redirect()->intended('/product')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/product')->with('faildel', 'gagal dihapus');
        }
    }

    public function restoreproduct()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.pages.product-terhapus', [
            'product' => $product,
        ]);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id);
        $product->restore();

        return redirect()->intended('/product-restore')->with('restore', 'berhasil restore');

    }

    public function deleteproduct(Request $request)
    {
        $ids = $request->ids;
        if ($ids != null) {

            $imgedelete = Product::onlyTrashed()->whereIn('id', $ids)->get();
            foreach ($imgedelete as $img) {
                File::delete(public_path('foto/product') . '/' . $img->image);
            }

            $product = Product::onlyTrashed()->whereIn('id', $ids);
            $product->forceDelete();



            if ($product) {
                return redirect()->intended('/product-restore')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/product-restore')->with('faildel', 'gagal dihapus');
        }


    }

}