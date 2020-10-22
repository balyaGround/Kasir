<?php

namespace App\Http\Controllers;

use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'bahan' => Bahan::all(),
            'produk' => Produk::all()
        ];
        return view('admin.dashboard.index', ['data' => $data]);
    }

    public function bayar(Request $request){
        $dataAll = json_decode($request->data);

    }
}
