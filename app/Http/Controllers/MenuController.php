<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menus = Menu::all();

            return response()->json([
                'status' => 'success',
                'data' => $menus
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
            $reqq = $req;
            if($reqq->hasFile('pic')){
                $file = $reqq->file('pic');
                $name = $file->getClientOriginalName();
                $file_name = time() . '_' . $name;
                $file->move(base_path() . '/public/assets/menus', $file_name);
            }

            $req = $req->all();
            if($reqq->hasFile('pic')){
                $req['pic'] = 'assets/menus/'.$file_name;
            }

            $menu = Menu::create($req);

            return response()->json([
                'status' => 'success',
                'data' => $menu
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
            $menu = Menu::find($id);

            return response()->json([
                'status' => 'success',
                'data' => $menu
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
            $menu = Menu::find($id);

            $reqq = $req;
            if($reqq->hasFile('pic')){
                $file = $reqq->file('pic');
                $name = $file->getClientOriginalName();
                $file_name = time() . '_' . $name;
                $file->move(base_path() . '/public/assets/menus', $file_name);
            }

            $req = $req->all();
            if($reqq->hasFile('pic')){
                $req['pic'] = 'assets/menus/'.$file_name;
            }

            $menu->update($req);

            return response()->json([
                'status' => 'success',
                'message' => 'Menu berhasil diupdate.',
                'data' => $menu
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
            Menu::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Menu berhasil dihapus.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
