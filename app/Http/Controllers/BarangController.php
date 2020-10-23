<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $dataProduk = Produk::all();
        $dataBahan = Bahan::all();
        $data = [
            'dataProduk' => $dataProduk,
            'dataBahan' => $dataBahan
        ];
        return view('admin.barang.index', ['data' => $data]);
    }

    public function bahanSelection(){
        $bahan = Bahan::all();
        return json_encode($bahan);
    }
}
