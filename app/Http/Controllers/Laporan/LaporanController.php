<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(){
        return view('admin.report-management.report.index');
    }

    public function dataTable(){
        $data = Penjualan::query();

    }

    public function hariIni(){
        $data = PenjualanDetail::with(['produk'])->whereDate('created_at',date('Y-m-d'))->get()->toArray();

        $datajadi =[];
        $totalHargaJual =0;
        $totalHargaModal=0;
        $totalAmount=0;
        foreach($data as $dt){
            $temporary =false;
            $temporary_index = 0;
            foreach ($datajadi as $key=>$dts){
                if($dts['produk_id'] == $dt['produk_id'] ){
                    $temporary = true;
                    $temporary_index = $key;
                }
            }
            if($temporary){
                $datajadi[$temporary_index]['amount'] += $dt['amount'];
            }
            else{
                array_push($datajadi,$dt);
            }
        }

        foreach($datajadi as $dt){
            $totalHargaJual += $dt['amount'] * $dt['produk']['harga_jual'];
            $totalHargaModal += $dt['amount'] * $dt['produk']['harga_modal'];
            $totalAmount +=$dt['amount'];
        }

        $allData =[
          'data' =>$datajadi,
          'total_harga_jual'=>$totalHargaJual,
          'total_harga_modal'=>$totalHargaModal,
          'total_amount'=>$totalAmount
        ];
        return view('admin.report-management.report.index',$allData);
    }

}
