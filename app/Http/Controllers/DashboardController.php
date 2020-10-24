<?php

namespace App\Http\Controllers;

use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\ProdukJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user =Auth::user();
        $dataAll = json_decode($request->data);
        $inv = time();
        $penjualan = Penjualan::create([
            'nomor_invoice'=>$inv,
            'user_id'=>$user['id'],
            'toko_id'=>$user['toko_id']
        ])->id;
//        dd($dataAll);
        foreach($dataAll as $dt){
            $dataBahan = ProdukJual::where('produk_id',$dt->id)->get();
            foreach($dataBahan as $dtBhn){
                $updateBahan = Bahan::find($dtBhn->bahan_id);
                $updateBahan->quantity = $updateBahan->quantity - $dtBhn->bahan_qty*$dt->amount;
                $updateBahan->save();
            }
            $penjualanDetails = PenjualanDetail::create([
                'penjualans_id'=>$penjualan,
                'produk_id'=>$dt->id,
                'amount'=>$dt->amount
            ]);
        }
        return json_encode($inv);
    }
}
