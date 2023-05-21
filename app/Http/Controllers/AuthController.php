<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            $userLogin = $user->id_role;
        } else {
            $userLogin = 3;
        }

        if ($userLogin == 1) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard')->with('loginberhasil', 'login berhasil');
            } else {
                return redirect()->intended('/login')->with('loginerror', 'login error');
            }
        } elseif ($userLogin == 2) {

            return redirect()->intended('/login')->with('bukanadmin', 'login error');
        } elseif ($userLogin == 3) {

            return redirect()->intended('/login')->with('failed', 'login error');
        }
    }

    public function profilupdate(Request $request, $id)
    {
        if ($request->image == null) {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:tb_user,email,' . $id,
                    'oldpassword' => 'required',
                    'password' => 'required',
                    'repassword' => 'required|same:password',
                ],

                [
                    'name.required' => 'name tidak boleh kosong',
                    'email.required' => 'email tidak boleh kosong',
                    'email.unique' => 'email sudah terdaftar',
                    'oldpassword.required' => 'oldpassword tidak boleh kosong',
                    'password.required' => 'password tidak boleh kosong',
                    'repassword.required' => 'repassword tidak boleh kosong',
                    'repassword.same' => 'repassword tidak sama dengan password',
                ],
            );

            if (Hash::check($request->oldpassword, Auth::user()->password)) {

                if ($request->password == $request->repassword) {
                    $user = User::find($id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return redirect()->intended('/dashboard')->with('updateprofil', 'berhasil update profil');
                } else {

                    return redirect()->intended('/dashboard')->with('passwordtidaksama', 'gagal update profil');
                }
            } else {

                return redirect()->intended('/dashboard')->with('updateprofilerror', 'gagal update profil');
            }

        } else {

            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:tb_user,email,' . $id,
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'oldpassword' => 'required',
                    'password' => 'required',
                    'repassword' => 'required|same:password',
                ],
                [
                    'name.required' => 'name tidak boleh kosong',
                    'email.required' => 'email tidak boleh kosong',
                    'email.unique' => 'email sudah terdaftar',
                    'image.required' => 'image tidak boleh kosong',
                    'image.image' => 'image harus berupa gambar',
                    'image.mimes' => 'image harus berupa jpeg,png,jpg,gif,svg',
                    'image.max' => 'image maksimal 2mb',
                    'oldpassword.required' => 'oldpassword tidak boleh kosong',
                    'password.required' => 'password tidak boleh kosong',
                    'repassword.required' => 'repassword tidak boleh kosong',
                    'repassword.same' => 'repassword tidak sama dengan password',
                ]
            );

            if (Hash::check($request->oldpassword, Auth::user()->password)) {

                if ($request->password == $request->repassword) {
                    $deleteimg = User::find($id);
                    File::delete(public_path('foto/user') . '/' . $deleteimg->image);

                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('foto/user'), $imageName);

                    $user = User::find($id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->image = $imageName;
                    $user->save();
                    return redirect()->intended('/dashboard')->with('updateprofil', 'berhasil update profil');
                } else {

                    return redirect()->intended('/dashboard')->with('passwordtidaksama', 'gagal update profil');
                }
            } else {

                return redirect()->intended('/dashboard')->with('updateprofilerror', 'gagal update profil');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/login')->with('logout', 'berhasil logout');
    }
}