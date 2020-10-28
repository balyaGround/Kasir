<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Logs\StokLog;
use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


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

    public function stokLogs(){
//        dd("tes");
        $data = StokLog::with(['bahan:id,nama','toko:id,nama','user:id,username']);
        return DataTables::eloquent($data)->make(true);
    }

    public function bahanSelection(){
        $bahan = Bahan::all();
        return json_encode($bahan);
    }
}
