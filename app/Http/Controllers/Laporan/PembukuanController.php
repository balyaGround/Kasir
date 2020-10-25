<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembukuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembukuanController extends Controller
{
    public function index(){

    }

    public function insertPembukuan(Request $request){
      return $pembukuanInsert = Pembukuan::create([
          'income'=>$request->income,
          'outcome'=>$request->outcome,
          'penghasilan'=>$request->penghasilan,
          'user_id'=>$request->user->id
      ]);
    }

    public function updatePembukuan(Request $request){
        $pembukuanupdate = Pembukuan::find($request->data['id']);
        $pembukuanupdate->income = $request->data['income'] ?? 0;
        $pembukuanupdate->outcome = $request->data['outcome'] ?? 0;
        $pembukuanupdate->penghasilan = $request->data['income'] - $request->data['outcome'];
        $pembukuanupdate->save();
        return response('',200);
    }

    public function pembukuanDatatable(){
        $pembukuan = Pembukuan::query();
        return DataTables::eloquent($pembukuan)
            ->editColumn('created_at',function ($data){
                $tanggal = Carbon::parse($data->created_at);
                return $tanggal->format('d-m-Y',) ;
            })
            ->make(true);
    }

    public function generatePembukuan(){
        $tahun = date('Y');
        $bulan = date('m');
        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $cekPembukuanBulanIni = Pembukuan::whereBetween('created_at',[$tahun.'-'.$bulan.'-'.'1',$tahun.'-'.$bulan.'-'.$jumlahhari])->count();
        if($cekPembukuanBulanIni>=1){
            return 'pembukuan bulan ini sudah digenerate';
        }
        else{
                for($i = 1;$i<=$jumlahhari;$i++){
                    $pembukuanInsert = Pembukuan::create([
                        'income'=>0,
                        'outcome'=>0,
                        'penghasilan'=>0,
                        'user_id'=>0,
                        'created_at'=>$tahun.'-'.$bulan.'-'.$i,
                        'updated_at'=>$tahun.'-'.$bulan.'-'.$i
                    ]);
                }

            return response(json_encode(['success'=>true]),200);
        }

    }

    public function checkPembukuan(){
        $tahun = date('Y');
        $bulan = date('m');
        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $cekPembukuanBulanIni = Pembukuan::whereBetween('created_at',[$tahun.'-'.$bulan.'-'.'1',$tahun.'-'.$bulan.'-'.$jumlahhari])->count();
        $hasil = $cekPembukuanBulanIni>=1 ? true : false;
        return response(json_encode(['hasil'=>$hasil]),200);
    }

    public function tfootPembukuan(){
        $tahun = date('Y');
        $bulan = date('m');
        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $pembukuan = Pembukuan::whereBetween('created_at',[$tahun.'-'.$bulan.'-'.'1',$tahun.'-'.$bulan.'-'.$jumlahhari]);
        $data=[
            'totalIncome'=>$pembukuan->sum('income'),
            'totalOutcome'=>$pembukuan->sum('outcome'),
            'totalPenghasilan'=>$pembukuan->sum('penghasilan')
        ];

        return response(json_encode(['data'=>$data]),200);
    }
}
