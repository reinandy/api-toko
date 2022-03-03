<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\ReceiptDetail;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    
    public function store()
    {
        try {
            $code = '0001';

            $last = Receipt::orderBy('id', 'desc')->first();
            if (!empty($last)) {
                $code = (int) $last->code + 1;
                $code = str_pad($code, 4, "0", STR_PAD_LEFT);
            }

            $data = [
                'code' => $code
            ];

            $receipt = Receipt::create($data);

            return response()->json([
                'status' => 'success',
                'data' => $receipt
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
            $receipt = Receipt::with(['detail.menu'])->find($id);

            return response()->json([
                'status' => 'success',
                'data' => $receipt
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function pay($id)
    {
        try {
            $receipt = Receipt::find($id);
            
            $data = [
                'status' => 1
            ];

            $receipt->update($data);

            $receipt = Receipt::with(['detail.menu'])->find($id);

            return response()->json([
                'status' => 'success',
                'data' => $receipt
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
            Receipt::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Pesanan berhasil dibatalkan.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function addMenu(Request $req, $id)
    {
        try {
            $req = $req->all();
            $req['receipt_id'] = $id;

            $receiptDetail = ReceiptDetail::create($req);
            $receipt = Receipt::with(['detail.menu'])->find($id);

            return response()->json([
                'status' => 'success',
                'data' => $receipt
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function updateMenu(Request $req, $id)
    {
        try {
            $receiptDetail = ReceiptDetail::find($id);
            
            $req = $req->all();

            $receiptDetail->update($req);
            $receipt = Receipt::with(['detail.menu'])->find($receiptDetail->receipt_id);

            return response()->json([
                'status' => 'success',
                'data' => $receipt
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function deleteMenu($id)
    {
        try {
            ReceiptDetail::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Pesanan berhasil dibatalkan.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
