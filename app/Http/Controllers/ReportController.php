<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        try {
            $receipts = Receipt::with(['detail.menu'])->get();

            return response()->json([
                'status' => 'success',
                'data' => $receipts
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
