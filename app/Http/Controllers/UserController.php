<?php

namespace App\Http\Controllers;

use App\Models\Kulit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $jeniskulit = Kulit::all();

        $user = User::with('kulit')
            ->where('id_role', '2')
            ->get();

        return view('admin.pages.user', [
            'user' => $user,
            'jeniskulit' => $jeniskulit,
        ]);
    }

    public function detailuser($id)
    {
        $user = User::with('role')
            ->where('id', $id)
            ->first();

        $datakonsultasi = DB::table('tb_konsultasi')
            ->join('tb_antrian', 'tb_konsultasi.id_antrian', '=', 'tb_antrian.id')
            ->join('tb_keluhan', 'tb_antrian.id_keluhan', '=', 'tb_keluhan.id')
            ->join('tb_user', 'tb_antrian.id_user', '=', 'tb_user.id')
            ->select('tb_konsultasi.*', 'tb_antrian.no_antrian', 'tb_antrian.detail_keluhan', 'tb_antrian.tanggal', 'tb_keluhan.name as keluhannama')
            ->where('tb_user.id', $id)
            ->get();

        return view('admin.pages.detailuser', [
            'user' => $user,
            'datakonsultasi' => $datakonsultasi,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'required|email|unique:tb_user,email',
                'jenis_kelamin' => 'required',
                'id_kulit' => 'required',
                'tanggal_lahir' => 'required|date',
                'no_hp' => 'required|numeric|digits_between:10,12',
                'alamat' => 'required',
                'password' => 'required|min:8',
                'repassword' => 'required|same:password',

            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'image.required' => 'Foto tidak boleh kosong',
                'image.image' => 'Foto harus berupa gambar',
                'image.max' => 'Foto maksimal 2MB',
                'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email harus berupa email',
                'email.unique' => 'Email sudah terdaftar',
                'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
                'id_kulit.required' => 'Jenis Kulit tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal',
                'no_hp.required' => 'No HP tidak boleh kosong',
                'no_hp.numeric' => 'No HP harus berupa angka',
                'no_hp.digits_between' => 'No HP harus 10-12 digit',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'repassword.required' => 'Re-Password tidak boleh kosong',
                'repassword.same' => 'Re-Password tidak sama dengan Password',
            ]
        );

        $fileNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('foto/user/'), $fileNameImage);

        $user = new User;
        $user->name = $request->name;
        $user->image = $fileNameImage;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_kulit = $request->id_kulit;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->id_role = '2';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->intended('/user')->with('create', 'berhasil create');

    }

    public function update(Request $request, $id)
    {

        if ($request->image) {
            $request->validate(
                [
                    'name' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'email' => 'required|email|unique:tb_user,email,' . $id,
                    'jenis_kelamin' => 'required',
                    'id_kulit' => 'required',
                    'tanggal_lahir' => 'required|date',
                    'no_hp' => 'required|numeric|digits_between:10,12',
                    'alamat' => 'required',
                    'password' => 'required|min:8',
                    'repassword' => 'required|same:password',
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'password.required' => 'Password tidak boleh kosong',
                    'password.min' => 'Password minimal 8 karakter',
                    'repassword.required' => 'Re-Password tidak boleh kosong',
                    'repassword.same' => 'Re-Password tidak sama dengan Password',
                    'image.required' => 'Foto tidak boleh kosong',
                    'image.image' => 'Foto harus berupa gambar',
                    'image.max' => 'Foto maksimal 2MB',
                    'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email harus berupa email',
                    'email.unique' => 'Email sudah terdaftar',
                    'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
                    'id_kulit.required' => 'Jenis Kulit tidak boleh kosong',
                    'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                    'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal',
                    'no_hp.required' => 'No HP tidak boleh kosong',
                    'no_hp.numeric' => 'No HP harus berupa angka',
                    'no_hp.digits_between' => 'No HP harus 10-12 digit',
                    'alamat.required' => 'Alamat tidak boleh kosong',

                ]
            );

            $deleteimage = User::where('id', $id)->first();
            File::delete(public_path('foto/user') . '/' . $deleteimage->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/user/'), $fileNameImage);

            $user = User::find($id);
            $user->name = $request->name;
            $user->image = $fileNameImage;
            $user->email = $request->email;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->id_kulit = $request->id_kulit;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('/user')->with('update', 'berhasil update');
        } else {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:tb_user,email,' . $id,
                    'jenis_kelamin' => 'required',
                    'id_kulit' => 'required',
                    'tanggal_lahir' => 'required|date',
                    'no_hp' => 'required|numeric|digits_between:10,12',
                    'alamat' => 'required',
                    'password' => 'required|min:8',
                    'repassword' => 'required|same:password',
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'password.required' => 'Password tidak boleh kosong',
                    'password.min' => 'Password minimal 8 karakter',
                    'repassword.required' => 'Re-Password tidak boleh kosong',
                    'repassword.same' => 'Re-Password tidak sama dengan Password',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email harus berupa email',
                    'email.unique' => 'Email sudah terdaftar',
                    'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
                    'id_kulit.required' => 'Jenis Kulit tidak boleh kosong',
                    'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
                    'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal',
                    'no_hp.required' => 'No HP tidak boleh kosong',
                    'no_hp.numeric' => 'No HP harus berupa angka',
                    'no_hp.digits_between' => 'No HP harus 10-12 digit',
                    'alamat.required' => 'Alamat tidak boleh kosong',

                ]
            );

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->id_kulit = $request->id_kulit;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('/user')->with('update', 'berhasil update');
        }

    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;

        if ($ids != null) {

            $user = User::whereIn('id', $ids);
            $user->delete();

            if ($user) {
                return redirect()->intended('/user')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/user')->with('faildel', 'gagal dihapus');
        }

    }

    public function restoreuser()
    {
        $user = User::onlyTrashed()->get();

        return view('admin.pages.user-terhapus', [
            'user' => $user,
        ]);
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        if ($user) {
            return redirect()->intended('/user-restore')->with('restore', 'berhasil direstore');
        }
    }

    public function forcedelete(Request $request)
    {
        $ids = $request->ids;

        if ($ids != null) {

            $deleteimage = User::onlyTrashed()->whereIn('id', $ids)->get();
            foreach ($deleteimage as $delete) {
                File::delete(public_path('foto/user') . '/' . $delete->image);
            }

            $user = User::onlyTrashed()->whereIn('id', $ids);
            $user->forceDelete();

            if ($user) {
                return redirect()->intended('/user-restore')->with('delete', 'berhasil dihapus');
            }
        } else {
            return redirect()->intended('/user-restore')->with('faildel', 'gagal dihapus');
        }

    }



}