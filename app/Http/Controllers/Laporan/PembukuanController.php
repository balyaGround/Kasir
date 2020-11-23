<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembukuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use function GuzzleHttp\Promise\all;

class PembukuanController extends Controller
{
    public function index()
    {

    }

    public function insertPembukuan(Request $request)
    {
        return $pembukuanInsert = Pembukuan::create([
            'income' => $request->income,
            'outcome' => $request->outcome,
            'penghasilan' => $request->penghasilan,
            'user_id' => $request->user->id
        ]);
    }

    public function updatePembukuan(Request $request)
    {

        //default
        $pembukuanupdate = Pembukuan::find($request->data['id']);
        $pembukuanupdate->income = $request->data['income'] ?? 0;
        $pembukuanupdate->outcome = $request->data['outcome'] ?? 0;
        $pembukuanupdate->penghasilan = $pembukuanupdate->income - $pembukuanupdate->outcome;
        $pembukuanupdate->save();
        //endofdefault

        //ini yg barulah pokoknya
//        $arr = explode("-", $request->all()['data']['created_at']);
//        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $arr[1], $arr[2]);

//        $cekPembukuan = Pembukuan::whereDate('created_at', $arr[2] . '-' . $arr[1] . '-' . ($arr[0] - 1))->first();
//        $today = ($arr[2] . '-' . $arr[1] . '-' . $arr[0]);
//        $lastday = ($arr[2] . '-' . $arr[1] . '-' . $jumlahhari);

        //mau looping tapi cocok gak ya
//        $cekPembukuanH = Pembukuan::whereBetween('created_at', [$today, $lastday]);

        //ini yg minus minus
//        if (($cekPembukuan['penghasilan'] ?? 1) < 0) {
//            $pembukuanupdate = Pembukuan::find($request->data['id']);
//            $pembukuanupdate->income = $request->data['income'] ?? 0;
//            $pembukuanupdate->outcome = $request->data['outcome'] + abs($cekPembukuan['penghasilan']) ?? 0;
//            $pembukuanupdate->penghasilan = $pembukuanupdate->income - $pembukuanupdate->outcome;
//            $pembukuanupdate->save();
////            for($i=)
//            $cekPembukuanH = Pembukuan::whereDate('created_at', $arr[2] . '-' . $arr[1] . '-' . ($arr[0] + 1))->first();
//            if ($pembukuanupdate->penghasilan < 0) {
//                $pembukuanHupdate = Pembukuan::find($cekPembukuanH['id']);
//                $pembukuanHupdate->outcome = $pembukuanHupdate->outcome + abs($pembukuanupdate->penghasilan);
//                $pembukuanHupdate->penghasilan = $pembukuanHupdate->income - $pembukuanHupdate->outcome;
//                $pembukuanHupdate->save();
//            }
//
//        } else {
//            $pembukuanupdate = Pembukuan::find($request->data['id']);
//            $pembukuanupdate->income = $request->data['income'] ?? 0;
//            $pembukuanupdate->outcome = $request->data['outcome'] ?? 0;
//            $pembukuanupdate->penghasilan = $pembukuanupdate->income - $pembukuanupdate->outcome;
//            $pembukuanupdate->save();
//            $cekPembukuanH = Pembukuan::whereDate('created_at', $arr[2] . '-' . $arr[1] . '-' . ($arr[0] + 1))->first();
//            if ($pembukuanupdate->penghasilan < 0) {
//                $pembukuanHupdate = Pembukuan::find($cekPembukuanH['id']);
//                $pembukuanHupdate->outcome = $pembukuanHupdate->outcome + abs($pembukuanupdate->penghasilan);
//                $pembukuanHupdate->penghasilan = $pembukuanHupdate->income - $pembukuanHupdate->outcome;
//                $pembukuanHupdate->save();
//            }
//        }

        return response('', 200);
    }

    public function pembukuanDatatable()
    {
        $pembukuan = Pembukuan::query();
        return DataTables::eloquent($pembukuan)
            ->editColumn('created_at', function ($data) {
                $tanggal = Carbon::parse($data->created_at);
                return $tanggal->format('d-m-Y',);
            })
            ->make(true);
    }

    public function generatePembukuan()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $cekPembukuanBulanIni = Pembukuan::whereBetween('created_at', [$tahun . '-' . $bulan . '-' . '1', $tahun . '-' . $bulan . '-' . $jumlahhari])->count();
        if ($cekPembukuanBulanIni >= 1) {
            return 'pembukuan bulan ini sudah digenerate';
        } else {
            for ($i = 1; $i <= $jumlahhari; $i++) {
                $pembukuanInsert = Pembukuan::create([
                    'income' => 0,
                    'outcome' => 0,
                    'penghasilan' => 0,
                    'user_id' => 0,
                    'created_at' => $tahun . '-' . $bulan . '-' . $i,
                    'updated_at' => $tahun . '-' . $bulan . '-' . $i
                ]);
            }

            return response(json_encode(['success' => true]), 200);
        }

    }

    public function checkPembukuan()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $jumlahhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $cekPembukuanBulanIni = Pembukuan::whereBetween('created_at', [$tahun . '-' . $bulan . '-' . '1', $tahun . '-' . $bulan . '-' . $jumlahhari])->count();
        $hasil = $cekPembukuanBulanIni >= 1 ? true : false;
        return response(json_encode(['hasil' => $hasil]), 200);
    }

    public function tfootPembukuan($monthy)
    {
        $from = $monthy . '-01';
        $to = $monthy . '-31';
        $pembukuan = Pembukuan::whereBetween('created_at', [$from, $to]);

        $data = [
            'totalIncome' => $pembukuan->sum('income'),
            'totalOutcome' => $pembukuan->sum('outcome'),
            'totalPenghasilan' => $pembukuan->sum('penghasilan')
        ];

        return response(json_encode(['data' => $data]), 200);
    }

    public function getAllBuku()
    {

        $data = Pembukuan::selectRaw('year(created_at) year,month(created_at) month, monthname(created_at) monthname, count(*) data')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('month', 'desc')
            ->orderBy('year', 'desc')
            ->get();
        return response(json_encode(['data' => $data]), 200);
    }

    public function getAllBukuPerMonth($monthy)
    {
        $from = $monthy . '-01';
        $to = $monthy . '-31';
        $pembukuan = Pembukuan::whereBetween('created_at', [$from, $to]);
        return DataTables::eloquent($pembukuan)
            ->editColumn('created_at', function ($data) {
                $tanggal = Carbon::parse($data->created_at);
                return $tanggal->format('d-m-Y',);
            })
            ->make(true);
    }

}
