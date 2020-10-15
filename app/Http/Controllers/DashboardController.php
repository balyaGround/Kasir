<?php

namespace App\Http\Controllers;

use App\Models\Master\Bahan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data=[
          'bahan'=>Bahan::all()
        ];
        return view('admin.dashboard.index',['data'=>$data]);
    }
}
