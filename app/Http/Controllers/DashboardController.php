<?php

namespace App\Http\Controllers;

use App\Models\Logs\StokLog;
use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use App\Models\Pembukuan;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\ProdukJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


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

    public function invoiceList(){
        $data = Penjualan::with(['user'])->whereIn('toko_id',[Auth::user()->toko_id,1]);
        return DataTables::eloquent($data)
            ->editColumn('action',function ($data){
                $button = ' <button class="btn btn-primary" style="margin-top: 12px;margin-bottom: 1px"
                onclick="fungsiPrintInvoice('.$data->nomor_invoice.')"></i>
                                    Print
                                </button>';
                return $button;
            })
            ->editColumn('created_at',function ($data){
                return $data->created_at;
            })
            ->make(true);
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

        foreach($dataAll as $dt){
            $dataBahan = ProdukJual::where('produk_id',$dt->id)->get();
//            mengurangi stok bahan dan menulis nya di log
            foreach($dataBahan as $dtBhn){
                $updateBahan = Bahan::find($dtBhn->bahan_id);
                $qtySebelumUpdate = $updateBahan->quantity;
                $updateBahan->quantity = $updateBahan->quantity - $dtBhn->bahan_qty*$dt->amount;
                $updateBahan->save();

                $stokLog = StokLog::create([
                    'bahan_id'=>$dtBhn->bahan_id,
                    'aksi_quantity'=>$dtBhn->bahan_qty*$dt->amount,
                    'aksi'=>1,
                    'sebelum_quantity'=>$qtySebelumUpdate,
                    'final_quantity'=>$updateBahan->quantity,
                    'produk_id'=>$dt->id,
                    'toko_id'=>$user['toko_id'],
                    'user_id'=>$user['id']
                ]);

            }

            $penjualanDetails = PenjualanDetail::create([
                'penjualans_id'=>$penjualan,
                'produk_id'=>$dt->id,
                'amount'=>$dt->amount
            ]);


            $hargaProduk = Produk::select('harga_jual')->where('id',$dt->id)->first();
            $tambahPembukuan = Pembukuan::whereDate('created_at',date('Y-m-d'))->first();
            $updatePembukuan = Pembukuan::find($tambahPembukuan['id']);
            $updatePembukuan->income = $tambahPembukuan['income']+($hargaProduk['harga_jual']*$dt->amount);
            $updatePembukuan->penghasilan = ($tambahPembukuan['income']+($hargaProduk['harga_jual']*$dt->amount)) -$tambahPembukuan['outcome'];
            $updatePembukuan->save();
        }
        return json_encode($inv);
    }

    public function filterProduk($produkname){
        if($produkname=='kosong'){
            $data = [
                'produk' => Produk::all()
            ];
            return view('admin.dashboard.component.tab-content-daftarmenu', ['data' => $data]);
        }
        else{
            $produkname='%'.$produkname.'%';
            $data = ['produk'=>Produk::where('nama','LIKE',$produkname)->get()];
            return view('admin.dashboard.component.tab-content-daftarmenu', ['data' => $data]);
        }
    }
    public function filterStok($bahanname){
        if($bahanname=='kosong'){
            $data = [
                'bahan' => Bahan::all()
            ];
            return view('admin.dashboard.component.tab-content-stock', ['data' => $data]);
        }
        else{
            $bahanname='%'.$bahanname.'%';
            $data = ['bahan'=>Bahan::where('nama','LIKE',$bahanname)->get()];
            return view('admin.dashboard.component.tab-content-stock', ['data' => $data]);
        }
    }

}
