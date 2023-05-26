<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //register
    public function sign_up(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|',
            'password' => 'required|string',
            'jenis_kelamin' => 'required',
            'jenis_kulit' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        $cekemail = User::where('email', $data['email'])->first();

        if ($cekemail) {
            return response()->json([
                'message' => 'Email sudah terdaftar',
            ], 400);
        } else {
            $idrole = Role::firstOrCreate(['name' => 'user']);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'jenis_kelamin' => $data['jenis_kelamin'],
                'jenis_kulit' => $data['jenis_kulit'],
                'id_role' => $idrole->id,
                'tanggal_lahir' => $data['tanggal_lahir'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat']
            ]);
            $res = [
                'user' => $user,
            ];
            return response($res, 201);
        }
    }
    //login
    public function sign_in(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return response([
                'message' => 'incorrect email'
            ], 401);
        }
        if (!Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'incorrect password'
            ], 401);
        }
        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'message' => "login successfull",
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }
    //get data user
    public function userlogin()
    {
        $user = auth()->user();
        $res = [
            'message' => "success",
            'user' => $user,
        ];
        return response($res, 201);
    }
    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Logged Out');
    }
    //update password
    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'new_password' => 'required|min:8',
        ]);

        $user = $request->user();

        $user->password = bcrypt($data['new_password']);
        $user->save();

        return response([
            'message' => 'Password updated successfully'
        ], 200);
    }
    //update profile
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'jenis_kulit' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $user->update($data);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }
    //update foto

    public function updateFoto(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($user->image) {
            // Menghapus file foto sebelumnya
            $previousImagePath = public_path('foto/user/' . $user->image);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }
        }

        // Upload foto profil baru
        $photo = $request->file('image');
        $photoName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('foto/user'), $photoName);

        $user->image = $photoName;
        $user->save();

        return response()->json([
            'message' => 'Profile picture updated successfully',
        ]);

    }

}
