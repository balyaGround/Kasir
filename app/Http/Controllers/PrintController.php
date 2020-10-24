<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printInvoice($noinvoice){

        $penjualan = Penjualan::with(['penjualanDetail'=>function($q){
            return $q->with(['produk']);
        }])->where('nomor_invoice',$noinvoice)->first()->toArray();

        $dataSet = [];
        $totalHarga = 0;
        foreach($penjualan['penjualan_detail'] as $item){
                $item['produk']['amount'] = $item['amount'];
                $item['produk']['total'] = $item['amount']*$item['produk']['harga_jual'];
                $totalHarga +=$item['amount']*$item['produk']['harga_jual'];
                array_push($dataSet,$item['produk']);
        }

        return view('admin.dashboard.print.index',
            ['data'=>$dataSet,
                'totalHarga'=>$totalHarga,
                'time'=>Carbon::parse($penjualan['created_at'])
                        ->format('d, M Y H:i'),
                'nomorinvoice'=>$noinvoice
            ]);
    }
}
