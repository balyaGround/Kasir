<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pembukuan;
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
        $pembukuanupdate->income = $request->data['income'];
        $pembukuanupdate->outcome = $request->data['outcome'];
        $pembukuanupdate->penghasilan = $request->data['penghasilan'];
        $pembukuanupdate->save();
        return response('',200);
    }

    public function pembukuanDatatable(){
        $pembukuan = Pembukuan::query();
        return DataTables::eloquent($pembukuan)->make(true);
    }
}
