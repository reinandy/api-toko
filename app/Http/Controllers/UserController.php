<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::with([
                'role'
            ])->get();

            return response()->json([
                'status' => 'success',
                'data' => $users
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function store(Request $req)
    {
        try {
            $req = $req->all();
            $req['password'] = Hash::make($req['password']);

            $user = User::create($req);

            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            $user = User::with([
                'role'
            ])->find($id);

            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $user = User::find($id);

            $req = $req->all();
            if (!empty($req['password'])) {
                $req['password'] = Hash::make($req['password']);
            } else {
                unset($req['password']);
            }

            $user->update($req);

            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil diupdate.',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    
    public function destroy($id)
    {
        try {
            User::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil dihapus.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function login(Request $req)
    {
        try {
            $user = User::with(['role'])->where('username', $req->username)->first();

            if (empty($user)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Username tidak ditemukan.'
                ]);
            }

            if (!Hash::check($req->password, $user->password)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password salah.'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Selamat datang '.$user->name.'.',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
