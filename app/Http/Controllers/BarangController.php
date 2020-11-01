<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Logs\StokLog;
use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use App\Models\Master\Toko;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class BarangController extends Controller
{
    public function index(){
        $dataProduk = Produk::with(['toko:id,nama'])->get();
        $dataBahan = Bahan::all();
        $data = [
            'dataProduk' => $dataProduk,
            'dataBahan' => $dataBahan,
        ];
        return view('admin.barang.index', ['data' => $data]);
    }

    public function stokLogs(){
        $data = StokLog::with(['bahan:id,nama','toko:id,nama','user:id,username']);
        return DataTables::eloquent($data)
            ->editColumn('aksi',function ($data){
                return $data->aksi == 1 ? "Penambahan Stok" : "Pengurangan Stok";
            })
            ->editColumn('created_at', function ($data) {
                $tanggal = Carbon::parse($data->created_at);
                return $tanggal->format('d-m-Y',);
            })
            ->make(true);
    }

    public function bahanSelection(){
        $bahan = Bahan::all();
        return json_encode($bahan);
    }
}
