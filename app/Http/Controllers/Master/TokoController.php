<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Toko::all();
        return view('admin.master.toko.index',['data'=>$data]);
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
        $image      = $request->file('logo');
     $fileName = "";
        if ($image) {
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('storage/images/logostoko/small/'). $fileName);
            $image->move(public_path('storage/images/logostoko/big/',$fileName));

//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/logostoko/small'.'/'.$fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/logostoko/big'.'/'.$fileName, file_get_contents($image->getRealPath()), 'public');
        }
        $data = Toko::create(['nama'=>$request->nama,'logos_uri'=>$fileName]);
        return redirect(route('toko.index'));
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
        //
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

        $toUpdate = Toko::find($id);
        $toUpdate->nama = $request->nama;



        $image      = $request->file('logo');
        if($image){
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('storage/images/logostoko/small/'). $fileName);
            $image->move(public_path('storage/images/logostoko/big/',$fileName));

//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/logostoko/small'.'/'.$fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/logostoko/big'.'/'.$fileName, file_get_contents($image->getRealPath()), 'public');

            $toUpdate->logos_uri = $fileName;
        }

            $toUpdate->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Toko::find($id)->delete();
        return response('success delete',200);
        //
    }

    public function dataTable(){
        return DataTables::eloquent(Toko::query())
            ->editColumn('image',function($data){
                return  ($data->logos_uri == "" ? '<img src="'.asset("original-asset/no-photo.jpg").'" alt="" height="120" width="120">   ' : '<img src="'.asset("storage/images/logostoko/small")."/".$data->logos_uri.'" alt="" height="120" width="120"> ');

            })
            ->editColumn('action',function ($data){
                return " <button class='btn btn-info' data-toggle='modal' data-target='#modalEditToko' data-json='".json_encode($data)."'><i class='fa fa-pencil'></i>
                                                        </button>
                                                        <button class='btn btn-danger' data-toggle='modal'
                                                                data-target='#modalDeleteToko' data-json='".json_encode($data)."'><i
                                                                class='fa fa-trash'></i></button>";
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
