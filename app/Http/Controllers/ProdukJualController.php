<?php

namespace App\Http\Controllers;

use App\Models\Master\Produk;
use App\Models\ProdukJual;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdukJualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("tes");
        return "ss";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = ProdukJual::where('bahan_id',$request->bahan_id)
            ->where('produk_id',$request->produk_id);


        if($check->count() >=1 ){
            $ifupdate = $check->first()['bahan_qty']+intval($request->quantity);
            $check->update([
                'bahan_qty'=>$ifupdate
            ]);
        }
        else{
            $create = ProdukJual::create([
                'bahan_id'=>$request->bahan_id,
                'produk_id'=>$request->produk_id,
                'bahan_qty'=>$request->quantity
            ]);
        }
        return response("success tambah bahan",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProdukJual::where('produk_id',$id)->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProdukJual::find($id)->delete();
        return response('success delete bahan',200);
    }

    public function dataTable($produk_id){
        $data = ProdukJual::select('produk_juals.id as produkjual_id','produk_juals.*')
            ->with(['bahan'])
            ->where('produk_id',$produk_id)
        ;
//        dd($data->get()[0]);
        return DataTables::eloquent($data)
            ->editColumn('action',function ($data){
                $button = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteReceipt" data-id="'.$data->produkjual_id.'"  ><i class="fa fa-trash"></i></a>';
                return $button;
            })
            ->toJson();
    }

    public function insertBahan(Request $request){

    }
}
