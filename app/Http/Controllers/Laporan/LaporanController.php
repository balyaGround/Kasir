<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(){
        return view('admin.report-management.report.index');
    }

    public function dataTable(){
        $data = Penjualan::query();

    }

}
