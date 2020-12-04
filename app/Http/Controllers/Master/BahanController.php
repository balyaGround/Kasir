<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Logs\StokLog;
use App\Models\Master\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bahan::all();
        return view('admin.master.bahan.index', ['data' => $data]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('logo');
        $fileName = "";
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('storage/images/imageBahan/small/'). $fileName);
            $image->move(public_path('storage/images/imageBahan/big/',$fileName));

//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/imageBahan/small' . '/' . $fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/imageBahan/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
        }

        $data = Bahan::create(['nama' => $request->nama, 'harga' => 0, 'quantity' => $request->quantity, 'image_uri' => $fileName]);
        return redirect()->route('bahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $toUpdate = Bahan::find($id);

        $aksi = ($toUpdate->quantity > $request->quantity ? 2 : 1);
        $qtySebelumUpdate =  $toUpdate->quantity;
        $aksiQuantity = abs($toUpdate->quantity - $request->quantity);

        $toUpdate->nama = $request->nama;
        $toUpdate->harga = 0;
        $toUpdate->quantity = $request->quantity;

        $image = $request->file('logo');
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point

            Storage::disk('local')->put('public/images/imageBahan/small' . '/' . $fileName, $img, 'public');
            Storage::disk('local')->put('public/images/imageBahan/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
            $toUpdate->image_uri = $fileName;
        }
        $toUpdate->save();


        $user = Auth::user();

        $stokLog = StokLog::create([
            'bahan_id'=>$toUpdate->id,
            'aksi_quantity'=>$aksiQuantity,
            'aksi'=>$aksi,
            'sebelum_quantity'=>$qtySebelumUpdate,
            'final_quantity'=>$toUpdate->quantity,
            'produk_id'=>-1,
            'toko_id'=>$user['toko_id'],
            'user_id'=>$user['id']
        ]);

        return response('success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bahan::find($id)->delete();
        return response('success delete', 200);
        //
    }

    public function dataTable(){
        return DataTables::eloquent(Bahan::query())
            ->editColumn('image',function($data){

                return  ($data->image_uri == "" ? '<img src="'.asset("original-asset/no-photo.jpg").'" alt="" height="120" width="120">   ' : '<img src="'.asset("storage/images/imageBahan/small")."/".$data->image_uri.'" alt="" height="120" width="120"> ');
            })
            ->editColumn('action',function ($data){
                return " <button class='btn btn-info' data-toggle='modal' data-target='#modalEditBahan' data-json='".json_encode($data)."'><i class='fa fa-pencil'></i>
                                                        </button>
                                                        <button class='btn btn-danger' data-toggle='modal'
                                                                data-target='#modalDeleteBahan' data-json='".json_encode($data)."'><i
                                                                class='fa fa-trash'></i></button>";
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
